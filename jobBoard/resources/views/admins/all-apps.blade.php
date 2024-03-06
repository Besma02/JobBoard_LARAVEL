@extends('layouts.admins')
@section('content')
<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            
                <div class="container mt-3">
                @if(\Session::has('create'))
                <div class="alert alert-success">
                <p>{!!\Session::get('create')!!}</p>
                </div>
                @endif
                </div>
                <div class="container mt-3">
                @if(\Session::has('delete'))
                <div class="alert alert-success">
                <p>{!!\Session::get('delete')!!}</p>
                </div>
                @endif
                </div>
              
                <h5 class="card-title mb-4 d-inline">Jobs</h5>
              
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">cv</th>
                    <th scope="col">email</th>
                    <th scope="col">job_id</th>
                    <th scope="col">job_title</th>
                    <th scope="col">company</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($apps as $app)
                  <tr>
                    <th scope="row">{{$app->id}}</th>
                    <td><a href="{{asset('assets/cvs/'.$app->cv.'')}}" class="btn btn-success">CV</a></td>
                    <td>{{$app->email}}</td>
                    <td><a href="{{route('show.jobs',$app->job_id)}}" class="btn btn-success">GO to job</a></td>
                    <td>{{$app->job_title}}</td>
                    
                    <td> {{$app->company}}</td>
                   
                    <td><a href="{{route('delete.App',$app->id)}}" class="btn btn-danger text-center">delete</a></td>
                    </tr>
                  
                @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

@endsection