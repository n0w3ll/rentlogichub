<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::toast(session('success'),'success')->position('top');
            }

            if (session('error')) {
                Alert::toast(session('error'),'error')->position('top');
            }

            return $next($request);
        });
    }
}
