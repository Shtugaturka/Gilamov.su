<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio\Category;
use App\Models\Portfolio\Work;

class SitemapController extends MainController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['pages']=Page::active()->orderBy('id','ASC')->get();
        $this->data['categories']=Category::active()->orderBy('id','ASC')->get();
        $this->data['works']=Work::active()->orderBy('id','ASC')->get();

        return response()->view('sitemap',$this->data)->header('Content-Type', 'text/xml');
    }


}
