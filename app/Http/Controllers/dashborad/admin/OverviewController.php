<?php


namespace App\Http\Controllers\dashborad\admin;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
         return view('dashboard.admin.overviews.index');
       
    }
}
