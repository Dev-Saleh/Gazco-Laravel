<?php


namespace App\Http\Controllers\dashborad\observer;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
   
    public function index()
    {
         return view('dashboard.observer.overviews.index');
       
    }
}
