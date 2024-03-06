@extends('layouts.admins')
@section('content')
<div class="container "> 
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title ">Login</h5>
              <form method="post" class="p-auto" action="{{route('check.login')}}">
                @csrf
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
</div>



@endsection