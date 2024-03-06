@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Looking for a job?</h1>
            <h4>Please create an account</h4>
            <img src="" alt="">
        </div>
        <div class="col-md-6">
            <form action="/register/seeker" method="POST">
                @csrf
            <div class="card">
                <div class="card-header">register</div>
                <div class="card-body">
                    <div class="group-form">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
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
                        <button class="btn btn-primary" type="submit">register</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection