@extends('layouts.app')

@section('title','Contact')

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
           
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Contact List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>                   
                        <th>Subject</th>             
                        {{-- <th>Message</th>              --}}
                        <th>Actions</th>
                      </thead>

        @foreach ($contact as $key=>$value)
                   
                   <tbody>              
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}  </td>               
                          <td>{{ $value->subject }}</td>
                          {{-- <td>{{ $value->message }}</td> --}}
                         
                         
         <td class="text-right">

               <form  action="{{  route('contact.destroy',$value->id)  }}"  method="POST">
                  @csrf
                  <a href="{{   route('contact.show',$value->id) }}" class="btn btn-info">
                         <i class="fa fa-eye"></i>
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

