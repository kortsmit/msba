<?php

namespace App\Http\Controllers;

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
