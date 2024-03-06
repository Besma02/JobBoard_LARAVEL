@extends('layouts.app')
@section('content')
<div class="container mt-3">
  @if(\Session::has('save'))
 <div class="alert alert-success">
  <p>{!!\Session::get('save')!!}</p>
 </div>
  @endif
</div>
<div class="container mt-3">
  @if(\Session::has('apply'))
 <div class="alert alert-success">
  <p>{!!\Session::get('apply')!!}</p>
 </div>
  @endif
</div>
<style>
  
  .tajawal-regular {
  font-family: "Tajawal", sans-serif;
  font-weight: 500;
  font-style: normal;
  font-size: 18px;
}
</style>

<div class="container mt-5 ">
        <div class="row justify-content-center">
           <h1 class="text-center mb-5">Job-details</h1>
        </div>
        <section >
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class=" p-2 d-inline-block mr-5 rounded">
                <img src="{{asset('assets/images/'.$job->image.'')}}" alt="logo" style="width:30%">
              </div>
              <div class="ml-5" >
                <h2>{{$job->job_title}}<span>({{$job->company}})</span></h2>
                <div>
                
                 
                  <span class="text-primary">Job Region:</span>
                  <span class="m-2"><span class="icon-room mr-2"></span>{{$job->job_region}}</span>
                  <span class="text-primary">Job Type:</span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span>{{$job->job_type}}</span>
                </div>
              </div>
            </div>
          </div>
        
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
            <span class="icon-align-left mr-3 text-primary">Job Description:</span>
              <p class="h5 d-flex align-items-center mb-4 tajawal-regular ">{{$job->jobDescription}}</p>
              </div>
            <div class="mb-5">
            <span class="icon-rocket mr-3 text-primary">Responsablities:</span>
              <p class="h5 d-flex align-items-center mb-4 tajawal-regular ">{{$job->responsablities}}</p>
            </div>

            <div class="mb-5">
            <span class="icon-book mr-3 text-primary">Education_Experience:</span>
              <p class="h5 d-flex align-items-center mb-4 tajawal-regular">{{$job->education_experience}}</p>
            </div>

            <div class="mb-5">
            <span class="icon-turned_in mr-3 text-primary">OtherBenifits:</span>
              <p class="h5 d-flex align-items-center mb-4 tajawal-regular">{{$job->otherBenifits}}</p>
           </div>

            <div class="row mb-5">
              <div class="col-6">
                <form action="/jobs/save" method="post">
                   @csrf
                   <input name="job_id" type="hidden" value="{{$job->id}}">
                   <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                   <input name="job_image" type="hidden" value="{{$job->image}}">
                   <input name="job_title" type="hidden" value="{{$job->job_title}}">
                   <input name="company" type="hidden" value="{{$job->company}}">
                   <input name="job_region" type="hidden" value="{{$job->job_region}}">
                   <input name="job_type" type="hidden" value="{{$job->job_type}}">
                   @if($savedJob > 0)
                <button  class="btn btn-block btn-success btn-md" disabled>you Saved this Job</button>
                @else
                <button name="submit" type="submit" class="btn btn-block btn-light btn-md">Save Job</button>
                @endif
                </form>
              </div>
              <div class="col-6">
              <form action="/jobs/apply" method="post">
                   @csrf
                   <input name="job_id" type="hidden" value="{{$job->id}}">
                   <input name="job_image" type="hidden" value="{{$job->image}}">
                   <input name="job_title" type="hidden" value="{{$job->job_title}}">
                   <input name="company" type="hidden" value="{{$job->company}}">
                   <input name="job_region" type="hidden" value="{{$job->job_region}}">
                   <input name="job_type" type="hidden" value="{{$job->job_type}}">
                   @if($jobApply>0)
                <button  class="btn btn-block btn-light btn-md" disabled>you applied for this job </button>
                  @else
                  <button name="submit" type="submit" class="btn btn-block btn-primary btn-md">Apply Now</button>
                  @endif
              </form>
              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong>{{$job->create_at}}</li>
                <li class="mb-2"><strong class="text-black">Vaccancy:</strong>{{$job->vacancy}}</li>
                <li class="mb-2"><strong class="text-black">Employment Status:</strong> {{$job->job_type}}</li>
                <li class="mb-2"><strong class="text-black">Experience:</strong>{{$job->experience}}</li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong>{{$job->job_region}}</li>
                <li class="mb-2"><strong class="text-black">Salary:</strong>{{$job->salary}}</li>
                <li class="mb-2"><strong class="text-black">Gender:</strong>{{$job->gender}}</li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> {{$job->application_deadline}}</li>
              </ul>
            </div>


            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="  mt-3 h5 pl-3 mb-3 ">Categories</h3>
              <ul class="list-unstyled pl-3 mb-0">
                @foreach($categories as $category)
                <li class="mb-2"><a class="text-decoration-none" href="{{route('categories.single',$category->name)}}">{{$category->name}}</a></li>
                @endforeach
                <ul>
            </div>

          </div>
        </div>
      </div>
    </section>

      
    <section class="site-section" id="next">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">{{$relatedJobsCount}} Related Jobs</h2>
          </div>
        </div>
        
        <ul class="job-listings mb-5" style="border:1px solid;padding:5px">
          @foreach($relatedJobs as $job)
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="{{route('show.jobs',$job->id)}}">
            <div class="job-listing-logo">
              <img src="{{asset('assets/images/'.$job->image.'')}}" alt="Image"  style="width:40%">
            </div>
            </a>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{$job->job_title}}<span style="font-size:18px">({{$job->company}})</span></h2>
                
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> {{$job->job_region}}
              </div>
              <div class="job-listing-meta">
                @if($job->job_type=='full_time')
                <span class="btn btn-danger">{{$job->job_type}}</span>
                @else
                <span class="btn btn-success">{{$job->job_type}}</span>
                @endif
              </div>
            </div>
            
          </li>
          @endforeach
  
        </ul>
      </div>
    </section>



@endsection