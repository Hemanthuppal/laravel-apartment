<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()  {
        return view('admin.dashboard');
        
    }

    public function managerIndex()  {
        return view('manager.dashboard');
    }

    public function superadminIndex()  {
        return view('superadmin.dashboard');
        
    }

    public function residentIndex()  {
        return view('resident.dashboard');
    }
      public function watchmanIndex()  {
        return view('watchman.dashboard');
        
    }

  

}
