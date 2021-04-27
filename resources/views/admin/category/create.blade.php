@extends('layouts.app')

@section('title','Category')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('category.store') }}" class="btn btn-danger">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Category </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" action="{{  route('category.store')  }}" enctype="multipart/form-data">
    @csrf
                  <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="category" class="form-control">
                        </div>
                       <font style="color: red">
                         {{ ($errors->has('category'))?($errors->first('category')):'' }}
                        </font>  
                      </div>
                  </div>
            <button type="submit" class="btn btn-primary pull-left">Submit</button>
                   
        </form>

                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


@endsection