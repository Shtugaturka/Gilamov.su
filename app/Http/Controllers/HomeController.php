<?php
namespace App\Http\Controllers;

use App\Models\Portfolio\Category;
use App\Models\Portfolio\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class HomeController extends MainController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['canonical']=route('home');
        $this->data['categories']=Category::active()->where('parent_id','=',NULL)->orderBy('order')->get();
        $this->data['works']=Work::active()->orderBy('site_created','DESC')->limit(16)->get();

        return view('home',$this->data);
    }

}
