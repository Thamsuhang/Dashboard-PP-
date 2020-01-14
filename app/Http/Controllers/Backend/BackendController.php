<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class BackendController extends Controller
{
    protected $_backendPath = 'backend.';
    protected $_pagePath=Null;
    public function __construct()
    {
        $this->data('title',$this->title('admin'));
        $this->_pagePath = $this-> _backendPath .'pages.';
    }
}
