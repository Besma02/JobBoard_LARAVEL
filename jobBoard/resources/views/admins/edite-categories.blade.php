@extends('layouts.admins')
@section('content')

<div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="{{route('edit.categories',$category->id)}}" enctype="multipart/form-data">
               @csrf
                <div class="form-outline mb-4 mt-4">
                  <input type="text"value="{{$category->name}}" name="name" id="form2Example1" class="form-control" placeholder="name" />
                  @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>


@endsection