<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="#">@yield('title','JobBoard')</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('check.login')}}">Company</a>
        </li>
        
        @if(!Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{route('create.seeker')}}">Register</a>
        </li>
            
        @endif

        @if(Auth::check())
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{Auth::user()->email}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
            <li><a class="dropdown-item" href="{{route('applications')}}">Applications</a></li>
            <li><a class="dropdown-item" href="{{route('saved.Jobs')}}">Saved Jobs</a></li>
            <li><a class="dropdown-item" href="{{route('edit.profile')}}">Edit profile</a></li>
            <li><a class="dropdown-item" href="{{route('edit.cv')}}">Edit CV</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" id='logout' href="#">logout</a></li>
          </ul>
        </li>
       
        @endif
        <form action="{{route('logout')}}" id='form' method="post">@csrf</form>
      </ul>
      
    </div>
  </div>
</nav>
@yield('content')
  <script>
    let logout=document.getElementById('logout')
    let form=document.getElementById('form')
    logout.addEventListener('click',function(){
      form.submit();
    })
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>