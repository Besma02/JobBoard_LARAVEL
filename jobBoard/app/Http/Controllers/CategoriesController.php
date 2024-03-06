<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function singleCategory($name){
        $jobs=Job::where('category',$name)
        ->take(5)
        ->orderby('created_at','desc')
        ->get();
        return view('categories.single',compact('jobs','name'));
    }
}
