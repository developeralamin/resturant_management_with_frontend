@extends('layouts.app')

@section('title','Category')

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
              <a href="{{ route('category.create') }}" class="btn btn-danger">Add Category</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Category List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th class="text-center">Actions</th>
                      </thead>

                  @foreach ($category as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->category }}</td>
                          <td>{{ $value->created_at }}</td>
                          <td>{{ $value->updated_at }}</td>
                     <td class="text-right">

               <form  action="{{ route('category.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('category.edit',$value->id) }}" class="btn btn-info text-center">
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

