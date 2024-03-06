@extends('layouts.app')
@section('content')
<div class="container mt-3">
  @if(\Session::has('update'))
 <div class="alert alert-success">
  <p>{!!\Session::get('update')!!}</p>
 </div>
  @endif
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
      
        <div class="col-md-8">
            <form action="{{route('edit.profile')}}" method="POST">
                @csrf
            <div class="card">
                <div class="card-header text-center">Edit profile</div>
                <div class="card-body">
                    <div class="group-form mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$edit_profile->name}}">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                       
                        <label class="text-black" >image</label> 
                        <input name="image" type="file" class="form-control"  >  
                    </div>
                    <div class="group-form mb-3">
                        <label for="email">Job_title</label>
                        <input type="text" name="job_title" id="job_title" value="{{$edit_profile->job_title}}" class="form-control">
                        @if($errors->has('job_title'))
                        <span class="text-danger">{{$errors->first('job_title')}}</span>
                        @endif
                    </div>
                    <div class="group-form mb-3">
                        <label for="password">Bio</label>
                       <textarea name="bio" value="{{$edit_profile->bio}}" class="w-100">{{$edit_profile->bio}}</textarea>
                       @if($errors->has('bio'))
                        <span class="text-danger">{{$errors->first('bio')}}</span>
                        @endif
                    </div>
                    <br/>
                    <div class="group-form">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection