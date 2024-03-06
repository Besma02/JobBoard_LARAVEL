<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Application;
use App\Models\Category\Category;
use App\Models\Job;
use Illuminate\Support\Facades\File;

class AdminsController extends Controller
{
public function viewLogin(){
    return view('admins.view-login');
}
public function checkLogin(Request $request){
    if(auth()->guard('admin')->attempt(['email'=>$request->input('email'),
    'password'=>$request->input('password')
    
    ])){
    return redirect()->route('admins.dashboard');
}
return redirect()->back()->with(['error'=>'error login']);
}
public function index(){
    $jobs=Job::select()->count();
    $categories=Category::select()->count();
    $applications=Application::select()->count();
    $admins=Admin::select()->count();
    return view('admins.index',compact('jobs','categories','applications','admins'));
}
public function admins(){
    $admins=Admin::all();
    return view('admins.all-admins',compact('admins'));
}
public function createAdmins(){
   
    return view('admins.create-admins');
}
public function storeAdmins(){
    request()->validate([
        'name'=>['required',"max:40"],
        'email'=>['required',"max:40"],
        'password'=>['required']
    ]);
   
     $createAdmin= Admin::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>bcrypt(request('password')),
        
    ]);

    if($createAdmin){
        return redirect('admin/all-admins')->with('create', 'Admin created successfuly ');

    }
  
}
public function displayCategories(){

    $categories=Category::all();
   
   return view('admins.display-categories',compact('categories'));
}
public function createCategories(){


return view('admins.create-categories');
}


public function storeCategories(){
    request()->validate([
        'name'=>['required',"max:40"],
       
    ]);
   
     $createCategory= Category::create([
        'name'=>request('name'),
       
        
    ]);

    if($createCategory){
        return redirect('admin/display-categories')->with('create', 'Category created successfuly ');

    }
  
}


public function editCategories($id){
$category=Category::find($id);

return view('admins.edite-categories',compact('category'));
}

public function updateCategories($id){
    request()->validate([
        'name'=>['required',"max:40"],
       
    ]);
    $update_category=Category::find($id);
    $update_category->update([
        'name'=>request('name'),
       
    ]);
    if($update_category){
        return redirect('/admin/display-categories')->with('update', 'Category  updated  successfuly ');

    }

}

public function deleteCategories($id){
$deleteCategory=Category::find($id);
$deleteCategory->delete();

if($deleteCategory){
        return redirect('/admin/display-categories')->with('delete', 'Category deleted successfuly');

    }
}
public function allJobs(){
$jobs=Job::all();

return view('admins.all-jobs',compact('jobs'));
}
public function createJobs(){
    $categories=Category::all();

return view('admins.create-jobs',compact('categories'));
}
public function storeJobs(Request $request){
   request()->validate([
        'job_title'=>['required',"max:40"],
        'job_region'=>['required',"max:40"],
        'company'=>['required'],
        'job_type'=>['required'],
        'vacancy'=>['required'],
        'gender'=>['required'],
        'salary'=>['required'],
        'experience'=>['required'],
        'application_deadline'=>['required'],
        'jobDescription'=>['required'],
        'responsablities'=>['required'],
        'education_experience'=>['required'],
        'otherBenifits'=>['required'],
        'category'=>['required'],
        'image'=>'required'
     

    ]);
   
  
   
    $destinationPath='assets/images/';
    $file=$request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath),$file);
   

     $createJobs= Job::create([
        'job_title'=>request('job_title'),
        'job_region'=>request('job_region'),
       'company'=>request('company'),
        'job_type'=>request('job_type'),
        'vacancy'=>request('vacancy'),
        'experience'=>request('experience'),
        'salary'=>request('salary'),
        'gender'=>request('gender'),
        'application_deadline'=>request('application_deadline'),
        'jobDescription'=>request('jobDescription'),
        'responsablities'=>request('responsablities'),
        'education_experience'=>request('education_experience'),
        'otherBenifits'=>request('otherBenifits'),
        'category'=>request('category'),
        'image'=>$file
        
    ]);

    if($createJobs){
        return redirect('admin/display-jobs')->with('create', 'Jobs created successfuly ');

    }

}
public function deleteJobs($id){
$deleteJob=Job::find($id);
if(File::exists(public_path('assets/images/'.$deleteJob->image))){
        File::delete(public_path('assets/images/'.$deleteJob->image));
    }else{
        $deleteJob->delete();
    }


if($deleteJob){
        return redirect('/admin/display-jobs')->with('delete', 'Job deleted successfuly');

    }
}
public function allApps(){
    $apps=Application::all();
    return view('admins.all-apps',compact('apps'));
}
public function deleteApp($id){
$deleteApp=Application::find($id);

$deleteApp->delete();
    


if($deleteApp){
        return redirect('/admin/display-apps')->with('delete', 'Application deleted successfuly');

    }
}
}
