@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row shadow-sm border p-5 ">
        <div class="col-6 d-flex justify-content-end  ">
            <img src="{{asset('img/logo.png')}}" class="w-100 rounded-circle"   style="min-width:30px;max-width:100px;">
        </div>
        <div class="col-6  d-flex align-items-center  ">
            <h1 >netWash</h1>
        </div>
    </div>
</div>
@endsection
