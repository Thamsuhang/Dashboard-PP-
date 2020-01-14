<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends BackendController
{
    public function __construct()
    {
        parent::__construct();

    }
    public function index(){
        return view($this->_pagePath.'dashboard.dashboard',$this->data);
    }
}
