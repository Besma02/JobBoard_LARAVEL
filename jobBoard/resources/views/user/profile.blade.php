@extends('layouts.app')
@section('content')

<section class="" >
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7">
            <div class="card p-3 py-4 mt-5">
                    
                    <div class="text-center">
                        <img src="{{asset('assets/user_images/'.$profile->image.'')}}" width="100" class="rounded-circle">
                    </div>
                    
                    <div class="text-center mt-3">
                       
                        <a href="{{asset('assets/cvs/'.$profile->cv.'')}}" class="bg-secondary p-1 px-4 rounded text-white text-decoration-none">Download cv</a>
                        <h5 class="mt-2 mb-0">{{$profile->name}}</h5>
                        <h6 class="text-primary">{{$profile->job_title}}</h6>
                        
                        <div class="px-4 mt-1">
                            <p class="fonts">{{$profile->bio}} </p>
                        
                        </div>
                        
                        <div class="px-3">
                    <a href="{{$profile->facebook}}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                    <a href="{{$profile->linkedin}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
                        
                      
                    </div>
                 
                </div>
            </div>
        </div>

        
      </div>
</section>


@endsection