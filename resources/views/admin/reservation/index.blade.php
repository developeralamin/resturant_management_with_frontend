@extends('layouts.app')

@section('title','Resarvation')

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
                  <h4 class="card-title ">All Reservation List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>            
                        <th>Date&Time</th>
                        <th>Message</th>             
                        <th>Status</th>             
                         <th>Actions</th>
                      </thead>

        @foreach ($reserve as $key=>$value)
                   
                   <tbody>              
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->phone }}  </td>               
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->date_and_time }}</td>
                          <td>{{ $value->message }}</td>
                          <th>
                         @if($value->status == true)
                                 <span style="background-color: green;color: white;padding:4px;" class="label text-">Confirmed</span>
                         @else
                            <span style="background-color: red;color: white;padding:4px;" class="label ">not Confirmed yet</span>
                        @endif

                              </th>
                         
         <td class="text-right">

         @if($value->status == false)
               <form  action="{{ route('reservation.status',$value->id) }}"  method="POST">
                 @csrf
                <button onclick="return confirm('Are you verify this request by phone?')" type="submit" class="btn btn-info"> <i class="material-icons">done</i></button></button>                
               </form> 

          @endif

             <form  action="{{ route('reservation.destroy',$value->id) }}"  method="POST">
                 @csrf
       
                @method('DELETE')              
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="material-icons">delete</i></button>                
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

