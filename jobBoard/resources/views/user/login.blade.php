@extends('layouts.app')
@section('content')
<div class="container mt-5 ">
<div class="container mt-3">
        @if(\Session::has('create'))
        <div class="alert alert-success">
        <p>{!!\Session::get('create')!!}</p>
        </div>
        @endif
        </div>
        <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('login.post')}}" method="POST">
                @csrf
            <div class="card">
                <div class="card-header">login</div>
                <div class="card-body">
                   
                    <div class="group-form">
                        <label for="email">email</label>
                        <input type="text" name="email" id="email" class="form-control">
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="group-form">
                        <label for="password">password</label>
                        <input type="text" name="password" id="password" class="form-control">
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <br/>
                    <div class="group-form">
                        <button class="btn btn-primary text-center" type="submit">login</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>

@endsection