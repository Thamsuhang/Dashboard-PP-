<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{
    public function index()
    {
        $this->data('title',$this->title('home'));

        return view($this->_pagePath.'home.home',$this->data);
    }
}
