@extends('layouts.app')
@section('content')


<div class="container mt-5 ">
        
        <section>
            <div class="container">
               <div class="row mb-5 justify-content-center ">
                <div class="col-md-7 text-center">
                  <h2>{{$name}}</h2>
                </div>
               </div>
               <ul class="job-listings-mb-5">
                @if($jobs->count() >0)
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
                @else
                <div class="alert alert-light text-center">
                <p>No job in this category yet</p>
                </div>

                @endif

               </ul>
            </div>     
          </section>
</div>












@endsection