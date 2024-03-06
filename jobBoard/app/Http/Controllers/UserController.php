<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeekerRegistrationRequest;
use App\Models\Application;
use App\Models\JobSaved;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function createSeeker(){
    return view('user.seeker-register');
}
public function storeSeeker(SeekerRegistrationRequest $request){
    
    $user= User::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>bcrypt(request('password')),
        'user_type'=>'seeker'
    ]);

    return redirect('/login')->with('create', 'user created successfuly ');
}
public function login(){
    return view('user.login');
}
public function postLogin(Request $request){
   $request->validate([
    'email'=>'required',
    'password'=>'required'
   ]);
   $credentials=$request->only('email','password');
   if(Auth::attempt($credentials)){
    return redirect('/');
}
return 'wrong email or password';
}
public function logout(){
    auth()->logout();
    return redirect()->route('login');
}
public function profile(){
    $profile=User::find(Auth::user()->id);
    return view('user.profile',compact('profile'));
}
public function applications(){
    $applications=Application::where('user_id',Auth::user()->id)->get();
    return view('user.applications',compact('applications'));
}
public function savedJobs(){
    $savedJobs=JobSaved::where('user_id',Auth::user()->id)->get();
    return view('user.savedJobs',compact('savedJobs'));
}
public function edit_profile(){
    $edit_profile=User::find(Auth::user()->id);
    return view('user.edit_profile',compact('edit_profile'));
}
public function update_profile(request $request){
    request()->validate([
        'name'=>['required',"max:40",'alpha:acsii'],
        'job_title'=>['required',"max:40"],
        'bio'=>'required',
        'image'=>'required'
    ]);

    if($request->hasFile('image'))
    {
        $destination = 'assets/user_images/' . Auth::user()->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.' . $extension;
        $file->move('assets/user_images/', $filename);
        Auth::user()->image = $filename;
    }
   
   
    $edit_profile=User::find(Auth::user()->id);
    $edit_profile->update([
        'name'=>$request->name,
        'job_title'=>$request->job_title,
        'bio'=>$request->bio,
        'image'=>$request->image
    ]);

    if($edit_profile){
        return redirect('/user/profile')->with('update', 'you successfuly updated your profile');

    }
}

public function edit_cv(){
 
    return view('user.edit_cv');
}

public function update_cv(request $request){
    $deleteOldCv=User::find(Auth::user()->id);
    if(File::exists(public_path('assets/cvs/'.$deleteOldCv->cv))){
        File::delete(public_path('assets/cvs/'.$deleteOldCv->cv));
    }else{
    $destinationPath='assets/cvs/';
    $file=$request->cv->getClientOriginalName();
    $request->cv->move($destinationPath,$file);
    $deleteOldCv->update([
        'cv'=>$file
    ]);
      
    
    }


    /*if($request->hasFile('cv'))
    {
        $destination = 'assets/cvs/' . Auth::user()->cv;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $file = $request->file('cv');
        $extension = $file->getClientOriginalExtension();
        $filename = time(). '.' . $extension;
        $file->move('assets/cvs/', $filename);
        Auth::user()->cv = $filename;
      
    }
    $edit_cv=User::find(Auth::user()->id);
    $edit_cv->update([
        'cv'=>$request->cv,
       
    ]);*/
   
  
        return redirect('/user/profile')->with('update', 'cv updated successfuly');
    
}



}
