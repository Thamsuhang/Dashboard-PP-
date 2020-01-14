<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FrontendController extends Controller
{
    protected $_frontendPath = 'frontend.';
    protected $_pagePath=Null;
    public function __construct()
    {
        $this->data('title',$this->title('home'));
        $this->_pagePath = $this-> _frontendPath .'pages.';
    }
}
