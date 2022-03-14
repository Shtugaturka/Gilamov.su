<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio\Work;
use App\Models\Portfolio\Category;
use App\Models\Url;
use Illuminate\Http\Request;


class UrlController extends MainController
{

    public function index($path = NULL, Request $request)
    {
        if($path == NULL) {
           return $this->home($request);
        }

        $url = Url::where('path','=',$path)->FirstOrFail();
        $model = $url->model;

        if ($model instanceof Work) {
            return $this->getWork($path, $model, $request);
        }
        if ($model instanceof Category) {
            return $this->getCategory($path, $model, $request);
        }

        if ($model instanceof Page) {
            return $this->getPage($path, $model, $request);
        }

        return abort(404);
    }


    public function getCategory($path, $category, Request $request)
    {
        $_request=$request->all();

        $this->data['category']=$category;

        if (isset($_request['page'])) {

            if($_request['page']==1) {
                return redirect($path);
            }

        }

        $this->data['title']=$this->data['category']->getSeoTitle();
        $this->data['description']=$this->data['category']->seo_description;
        $this->data['keywords']=$this->data['category']->seo_keywords;
        $this->data['hl']=$this->data['category']->seo_h1;

        $this->data['categories']=Category::active()->where('parent_id','=',NULL)->orderBy('order')->get();
        $this->data['works']=$this->data['category']->works()->active()->orderBy('site_created','DESC')->paginate(12);
        $this->data['canonical']=route('portfolio',['path'=>$path]);

        $this->data['breadcrumbs'][__('Портфолио')] = route('portfolio');
        $ancestors = $category->ancestors()->defaultOrder()->get();
        foreach ($ancestors as $parent) {
            $this->data['breadcrumbs'][$parent->getTitle()] = $parent->getUrl();
        }
        $this->data['breadcrumbs'][$this->data['category']->getTitle()] = $this->data['category']->getUrl();

        return view('portfolio/category',$this->data);
    }

    public function getWork($path, $work, Request $request)
    {
        $this->data['work']=$work;

        $this->data['title']=$this->data['work']->getSeoTitle();
        $this->data['keywords']=$this->data['work']->seo_keywords;
        $this->data['description']=$this->data['work']->seo_description;
        $this->data['hl']=$this->data['work']->seo_h1;
        $this->data['canonical']=route('portfolio',['path'=>$path]);

        $this->data['categories']=Category::active()->where('parent_id','=',NULL)->orderBy('order')->get();

        $this->data['breadcrumbs'][__('Портфолио')] = route('portfolio');
        $ancestors = $this->data['work']->category->ancestors()->defaultOrder()->get();
        foreach ($ancestors as $parent) {
            $this->data['breadcrumbs'][$parent->getTitle()] = $parent->getUrl();
        }

        $this->data['breadcrumbs'][$this->data['work']->category->getTitle()] = $this->data['work']->category->getUrl();
        $this->data['breadcrumbs'][$this->data['work']->getTitle()] = $this->data['work']->getUrl();

        return view('portfolio/work',$this->data);
    }

    public function home(Request $request)
    {
        if (isset($request['page'])) {

            if($request['page']==1) {
                return redirect('portfolio');
            }
        }

        $this->data['title']=setting('portfolio.title');
        $this->data['description']=setting('portfolio.description');
        $this->data['keywords']=setting('portfolio.keywords');
        $this->data['hl']=setting('portfolio.hl');
        $this->data['content']=setting('portfolio.content');
        $this->data['canonical']=route('portfolio');
        $this->data['works']=Work::active()->orderBy('site_created','DESC')->paginate(12);
        $this->data['categories']=Category::active()->where('parent_id','=',NULL)->orderBy('order')->get();
        $this->data['breadcrumbs'][__('Портфолио')] = route('portfolio');

        return view('portfolio/home',$this->data);
    }

    public function getPage($path, $page, Request $request = NULL)
    {
        $this->data['page']=$page;

        $this->data['title']=$this->data['page']->getSeoTitle();
        $this->data['keywords']=$this->data['page']->seo_keywords;
        $this->data['description']=$this->data['page']->seo_description;
        $this->data['hl']=$this->data['page']->seo_h1;

        $this->data['canonical']=route('page',['path'=>$path]);
        $this->data['breadcrumbs'][$this->data['page']->getTitle()] =$this->data['page']->getUrl();

        $slug_view='page.'.strtolower($this->data['page']->slug);

        if(view()->exists($slug_view)){

            return view($slug_view,$this->data)->render();
        }

        return view('page/main',$this->data);
    }

}
