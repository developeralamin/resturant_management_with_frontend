@extends('layouts.app')

@section('title','Item')

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
              <a href="{{ route('items.create') }}" class="btn btn-danger">Add Item</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Item List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        {{-- <th>Description</th> --}}
                        <th>Price</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                         <th>Actions</th>
                      </thead>

                  @foreach ($item as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/item/'.$value->image) }}" 
                            style="height: 100px; width: 100px" alt=""></td>
                          {{-- <td>{{ $value->image }}</td> --}}
                          <td>{{ $value->category->category }}</td>
                          {{-- <td>{{ $value->description }}</td> --}}
                          <td>{{ $value->price }}</td>
                          <td>{{ $value->created_at }}</td>
                          <td>{{ $value->updated_at }}</td>
                     <td class="text-right">

               <form  action="{{ route('items.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('items.edit',$value->id) }}" class="btn btn-info">
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

