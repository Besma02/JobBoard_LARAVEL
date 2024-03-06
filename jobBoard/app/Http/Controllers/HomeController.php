<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller


{   public function index(){
    
    $duplicates=DB::table('search')
    ->select('keyword',DB::raw('COUNT(*) as count'))
    ->groupBy('keyword')
    ->havingRaw('COUNT(*)>1')
    ->orderBy('count','asc')
    ->get();
    $jobs=Job::orderby('id','desc')->get();
    $jobsTotal=Job::all()->count();
    return view('welcome',compact('jobs', 'jobsTotal','duplicates'));
}
    
}
