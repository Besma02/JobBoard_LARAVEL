@extends('layouts.app')
@section('content')



<div class="container mt-5 ">
        <div class="row justify-content-center">
           <h1 class="text-center">Welcome to your Job Dream</h1>
        </div>
        <section>
         <div class="container">
            <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
            <h3 class="mt-5 mb-3">Job Search</h3>
            <form action="/jobs/search" method="post">
               @csrf 
               
               <input type="text" name="job_title" placeholder="job_title" >
               <select   name="job_region" class="btn-light btn-lg" datat-width="100%" >
                  <option selected>Select job region</option>
                  <option >tunis</option>
                  <option >nabeul</option>
                  <option >sousse</option>
                  <option >sfax</option>
                  <option >monastir</option>
                  <option >bizert</option>
                  <option >zagouin</option>
                  <option >kef</option>
                  <option >beja</option>
                  <option >midnin</option>
               </select>
               <select name="job_type"   >
                   <option selected>Select job type</option>
                  <option >Full_time</option>
                  <option >Part_time</option>
               </select>
               <button  type="submit" class="btn btn-secondary btn-sm">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
               <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
               </svg>
               </button>
               <div class="row">
               <div class="col-md-12 text-center poppular-keywords">
                  <h5 class="mt-5">Trending keywords:</h5>
                  <ul class="keywords list unstyled">
                     @foreach($duplicates as $duplicate)
                     <li style="list-style:none;margin:5px"><button class="btn btn-light">{{$duplicate->keyword}}</button></li>
                     @endforeach
                  </ul>
               </div>
               </div>
            </form>
            </div>

            </div>
         </div>
         </section>
       
        <section>
            <div class="container">
               <div class="row mb-5 justify-content-center ">
                <div class="col-md-7 text-center">
                  <h2>{{$jobsTotal}} Job-List</h2>
                </div>
               </div>
               <ul class="job-listings-mb-5">
                @foreach($jobs as $job)
                <li class="job-listings d-block d-sm-flex pb-3 align-items-center" style="border:1px solid; padding:10px">
                   <a href="{{route('show.jobs',$job->id)}}">
                    <div class="job-listings-logo">
                        <img src="{{asset('assets/images/'.$job->image.'')}}" alt="logo" style="width:30%">
                    </div>
                    </a> 
                    <div class="job-listings-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                    <div class="job-listings-positon custom-width w-50 mb-3 mb-sm-0">
                    <h3>{{$job->job_title}}</h3>
                 <span>{{$job->company}}</span>
                 </div>
                 </div>
                 <div class="job-listings-location custom-width w-25 mb-3 mb-sm-0">
                 <p>{{$job->job_region}}</p>
                 </div>
                 <div class="job-listings-meta">
                 @if($job->job_type=='full_time')
                <span class="btn btn-danger">{{$job->job_type}}</span>
                @else
                <span class="btn btn-success">{{$job->job_type}}</span>
                @endif
                </div>
                </li>
                 
                @endforeach

               </ul>
            </div>     
          </section>
</div>

    
@endsection