@extends('layouts.app')

@section('title','Contact')

@section('content')

    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12  ">
                    <div class="card">
                        <div class="card-header card-header-primary">
                       <h4 class="card-title ">{{ $contact->subject }}</h4>
                         </div>
                        <div class="card-content pl-5 pt-4">
                           <div class="row">
                               <div class="col-md-12">
                                   <strong>Name:</strong> {{ $contact->name }}<br>
                                   <strong>Email:</strong> {{ $contact->email }}</b> <br>
                                   <strong>Message:</strong> </strong><hr>

                                   <p>{{ $contact->message }}</p><hr>

                               </div>
                           </div>
                            <a href="{{ route('contact.index') }}" class="btn btn-danger">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

