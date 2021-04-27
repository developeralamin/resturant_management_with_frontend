@extends('layouts.app')

@section('title','Slider')


@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('slider.store') }}" class="btn btn-danger">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update Slider </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" 
    action="{{ route('slider.update',$value->id) }}" enctype="multipart/form-data">
    
                   @csrf
                   @method('PUT')  

                   <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text"  name="title"  value="{{ $value->title }}" class="form-control">
                        </div>
                       <font style="color: red">
              {{ ($errors->has('title'))?($errors->first('title')):'' }}
              </font>  
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Title</label>
                          <input type="text"  name="sub_title" value="{{ $value->sub_title }}" class="form-control">
                        </div>
            <font style="color: red">
              {{ ($errors->has('sub_title'))?($errors->first('sub_title')):'' }}
              </font>
                      </div>

            <div class="col-md-8">            
               <div class="form-group">
               <label>Upload Image</label>
               <div class="row">
                <div class="col-12">
                 <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                 <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp"  name="image" value="image">
                                      
                </div>
                    <font style="color: red">
            {{ ($errors->has('image'))?($errors->first('image')):'' }}
           </font>
               </div>
               </div>
              </div>

             </div>

            <button type="submit" class="btn btn-primary pull-left">Update</button>
                   
        </form>

                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>





@endsection