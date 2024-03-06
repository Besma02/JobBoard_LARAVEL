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
            <form action="{{route('edit.cv')}}" method="POST" enctype= "multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header text-center">Update cv</div>
                <div class="card-body">
                    <div class="group-form mb-3">
                        
                        <input type="file" name="cv" class="form-control">
                      
                    </div>
                                      
                    <br/>
                    <div class="group-form">
                        <button class="btn btn-primary" type="submit">Update cv</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection