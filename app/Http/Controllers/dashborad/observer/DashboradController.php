<?php


namespace App\Http\Controllers\dashborad\observer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboradController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
         return view('dashboard.observer.overviews.index');
       
    }
}
