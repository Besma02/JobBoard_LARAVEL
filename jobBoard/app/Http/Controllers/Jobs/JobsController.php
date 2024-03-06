<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category\Category;
use App\Models\Job;
use App\Models\JobSaved;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function show($id){
        $job=Job::find($id);

        $relatedJobs=Job::where('category',$job->category)
        ->where('id','!=',$id)->take(5)->get();
        $relatedJobsCount=Job::where('category',$job->category)
        ->where('id','!=',$id)->take(5)->count();
        //save job
        $savedJob=JobSaved::where('job_id',$id)->where('user_id',Auth::user()->id)
        ->count();
        //verifing user apply for a job
        $jobApply=Application::where('job_id',$id)->where('user_id',Auth::user()->id)
        ->count();
        //categories
        $categories=Category::all();

        return view('jobs.show',compact('job','relatedJobs','relatedJobsCount','savedJob','jobApply','categories'));
    }
    public function saveJob(request $request){
    $saveJob=JobSaved::create([
        'job_id'=>$request->job_id,
        'user_id'=>$request->user_id,
        'job_image'=>$request->job_image,
        'job_title'=>$request->job_title,
        'job_region'=>$request->job_region,
        'job_type'=>$request->job_type,
        'company'=>$request->company,
        'created_at'=>$request->created_at,
        'updated_at'=>$request->updated_at
    ]);
    if($saveJob){
        return redirect('/jobs/show'.$request->job_id.'')->with('save', 'job successfuly saved');

    }
    
    }
    public function jobApply(request $request){
        if(Auth::user()->cv=='No cv'){
            return redirect('/jobs/show'.$request->job_id.'')->with('apply', 'upload your cv');

        }else{
         $applyJob=Application::create([
        'cv'=>Auth::user()->cv,
        'job_id'=>$request->job_id,
        'user_id'=>Auth::user()->id,
        'email'=>Auth::user()->email,
        'job_image'=>$request->job_image,
        'job_title'=>$request->job_title,
        'job_region'=>$request->job_region,
        'job_type'=>$request->job_type,
        'company'=>$request->company,
        'created_at'=>$request->created_at,
        'updated_at'=>$request->updated_at
    ]);
    if($applyJob){
        return redirect('/jobs/show'.$request->job_id.'')->with('apply', 'you successfuly applied to this job');

    }
        }

    }
    public function search(Request $request){
        Search::create([
            'keyword'=>$request->job_title
        ]);


        $job_title=$request->get('job_title');
        $job_region=$request->get('job_region');
        $job_type=$request->get('job_type');
        $search=Job::select()->where('job_title','like',"%$job_title%")
        ->where('job_region','like',"%$job_region%")
        ->where('job_type','like',"%$job_type%")
        ->get();
        return view('jobs.search',compact('search'));

    }
}
