<?php

namespace App\Http\Controllers;

use App\internship;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(isset($_GET["search"])){
            $text=$_GET["search"];
            $internships=internship::where("baslik","like","%{$text}%")->where(Auth::check() && auth()->user()->admin?[]:["aktif"=>1])->orderBy("id","desc")->paginate(10);
        }else{
            $internships=internship::where(Auth::check() && auth()->user()->admin?[]:["aktif"=>1])->orderBy("id","desc")->paginate(10);
        }
        return view("home",compact('internships'));
    }

    public function logout(){
        auth()->logout();
        return redirect()->route("home");
    }
}
