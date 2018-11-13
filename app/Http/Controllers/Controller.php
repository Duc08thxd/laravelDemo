<?php

namespace App\Http\Controllers;



use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct(){
    	$this->DangNhap();

    }

    function DangNhap(){
    	if (Auth::check()) {
    		view()->share('user_login', Auth::user());
    	}
    }
}
