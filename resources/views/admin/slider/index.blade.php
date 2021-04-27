@extends('layouts.app')

@section('title','Slider')

@section('content')

<div class="content">
        <div class="container-fluid">

           @if(session('message'))
             <div class="alert alert-success" role="alert">
              {{ session('message') }}
            </div>
         @endif

          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('slider.create') }}" class="btn btn-danger">Add Slider</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Slider List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                         <th>Actions</th>
                      </thead>

                  @foreach ($slider as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->title }}</td>
                          <td>{{ $value->sub_title }}</td>
                         <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/slider/'.$value->image) }}" 
                            style="height: 100px; width: 100px" alt=""></td>
                          {{-- <td>{{ $value->image }}</td> --}}
                          <td>{{ $value->created_at }}</td>
                          <td>{{ $value->updated_at }}</td>
                     <td class="text-right">

               <form  action="{{ route('slider.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('slider.edit',$value->id) }}" class="btn btn-info">
                         <i class="fa fa-edit"></i>
                    </a>   
                @method('DELETE')              
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>                
                      </form>                                    
                  </td>
                        </tr>
                      </tbody>
                        @endforeach()
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

@endsection

