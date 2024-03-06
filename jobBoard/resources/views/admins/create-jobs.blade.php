@extends('layouts.admins')
@section('content')
<section class="site-section">
      <div class="container">

        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div>
                <h2>Create a Job</h2>
              </div>
            </div>
          </div>
         
        </div>
        <div class="row mb-5">
          <div class="col-lg-12">
            <form class="p-4 p-md-5 border rounded" action="{{route('store.jobs')}}" method="post" enctype="multipart/form-data">
            @csrf
              <!--job details-->
            
              <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" name="job_title" class="form-control" id="job-title" placeholder="Product Designer">
                @if($errors->has('job_title'))
                        <span class="text-danger">{{$errors->first('job_title')}}</span>
                        @endif
             
              </div>
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" class="form-control"  placeholder="Company">
                @if($errors->has('company'))
                        <span class="text-danger">{{$errors->first('company')}}</span>
                        @endif
                </div>
             
            
            

              <div class="form-group">
                <label for="job-region">Job Region</label>
                <select name="job_region" class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                      <option value="tunis">tunis</option>
                      <option value="nabeul">nabeul</option>
                      <option value="bizert">bizert</option>
                      <option value="sousse">sousse</option>
                      <option value="sfax">sfax</option>
                      <option value="zagouin">zagouin</option>
                      <option value="midnin">midnin</option>
                      <option value="kef">kef</option>
                      <option value="beja">beja</option>
                    </select>
                    @if($errors->has('job_region'))
                        <span class="text-danger">{{$errors->first('job_region')}}</span>
                        @endif
              </div>

              <div class="form-group">
                <label for="job-type">Job Type</label>
                <select name="job_type" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                  <option value="part_time">Part Time</option>
                  <option value="full_time">Full Time</option>
                </select>
                @if($errors->has('job_type'))
                        <span class="text-danger">{{$errors->first('job_type')}}</span>
                        @endif
              </div>
              <div class="form-group">
                <label for="job-location">Vacancy</label>
                <input name="vacancy" type="text" class="form-control" id="job-location" placeholder="e.g. 3">
                @if($errors->has('Vacancy'))
                        <span class="text-danger">{{$errors->first('Vacancy')}}</span>
                        @endif
              </div>
              <div class="form-group">
                <label for="job-type">Job Category</label>
                <select name="category" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Category">
                 @foreach($categories as $category)
                 <option value="{{$category->name}}">{{$category->name}}</option>
                 @endforeach
                </select>
                @if($errors->has('category'))
                        <span class="text-danger">{{$errors->first('category')}}</span>
                        @endif
              </div>
              <div class="form-group">
                <label for="job-type">Experience</label>
                <select name="experience" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                  <option value="1-3 years">1-3 years</option>
                  <option value="3-6 years">3-6 years</option>
                  <option value="6-9 years">6-9 years</option>
                </select>
                @if($errors->has('experience'))
                        <span class="text-danger">{{$errors->first('experience')}}</span>
                        @endif
              </div>
              <div class="form-group">
                <label for="job-type">Salary</label>
                <select name="salary" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                  <option value="$50k - $70k">$50k - $70k</option>
                  <option value="$70k - $100k">$70k - $100k</option>
                  <option value="$100k - $150k">$100k - $150k</option>
                </select>
                @if($errors->has('salary'))
                        <span class="text-danger">{{$errors->first('salary')}}</span>
                        @endif
              </div>

              <div class="form-group">
                <label for="job-type">Gender</label>
                <select name="gender" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Any">Any</option>
                </select>
                @if($errors->has('gender'))
                        <span class="text-danger">{{$errors->first('gender')}}</span>
                        @endif
              </div>

              <div class="form-group">
                <label for="job-location">Application Deadline</label>
                <input name="application_deadline" type="text" class="form-control" id="" placeholder="e.g. 20-12-2022">
                @if($errors->has('application_deadline'))
                        <span class="text-danger">{{$errors->first('application_deadline')}}</span>
                        @endif
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Job Description</label> 
                  <textarea name="jobDescription" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
                  @if($errors->has('jobDescription'))
                        <span class="text-danger">{{$errors->first('jobDescription')}}</span>
                        @endif
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Responsablities</label> 
                  <textarea name="responsablities" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
                  @if($errors->has('responsablities'))
                        <span class="text-danger">{{$errors->first('responsablities')}}</span>
                        @endif
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Education & Experience</label> 
                  <textarea name="education_experience" id="" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience..."></textarea>
                  @if($errors->has('education_experience'))
                        <span class="text-danger">{{$errors->first('education_experience')}}</span>
                        @endif
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Other Benifits</label> 
                  <textarea name="otherBenifits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
                  @if($errors->has('otherBenifits'))
                        <span class="text-danger">{{$errors->first('otherBenifits')}}</span>
                        @endif
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" >images</label> 
                  <input name="image" type="file" class="form-control" >
                 
                </div>
              </div>

            
              
              <div class="col-lg-4 ml-auto">
                  <div class="row">  
                    <div class="col-6">
                      <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                    </div>
                  </div>
              </div>


            </form>
          </div>

         
        </div>
       
      </div>
    </section>
    @endsection
