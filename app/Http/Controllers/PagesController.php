<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Create the home page.
     *
     * @return $this
     */
    public function index()
    {
        return view('index');
    }

}
