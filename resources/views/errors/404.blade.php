@extends('layouts.app')

@section('content')
    <div class="container  text-center mt-5 p-5 w-75 ">
                <div class="card ">
                    <div class="card-header indigo text-white font-weight-bold p-3">
                        <h2><strong>Netwash</strong></h2>
                    </div>
                    <div class="card-body">
                        <h1>The requested url is not found.</h1>
                        <a href="{{ url()->previous()}}" class="btn btn-primary mt-5">Return to previous page</a>
                    </div>
                </div>
       
                
       
    </div>
@endsection