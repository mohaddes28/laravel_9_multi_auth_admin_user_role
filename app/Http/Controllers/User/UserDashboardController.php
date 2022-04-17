<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','authUser','verified']);
    }

    public function index(){
        return view('user.index');
    }
}