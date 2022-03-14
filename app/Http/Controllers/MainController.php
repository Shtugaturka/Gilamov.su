<?php
namespace App\Http\Controllers;

class MainController extends Controller
{
    public $data=[];


    public function __construct()
    {
    $this->data['title']=setting('site.title');
    $this->data['keywords']=setting('site.keywords');
    $this->data['description']=setting('site.description');
    $this->data['hl']='';
    $this->data['canonical']='';

    $this->data['breadcrumbs'][trans('Главная')]='/';
    }

}
