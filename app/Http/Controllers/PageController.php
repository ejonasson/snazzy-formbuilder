<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class PageController extends Controller
{
    /**
     * Display your homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->action('Form\FormController@index');
        }
        return view('pages.home');
    }
}
