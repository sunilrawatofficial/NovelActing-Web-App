@extends('layouts.MasterLayout.app')

@section('content')
<div class="container mt-5">
    <div class="container text-center">    
        <img src="{{asset('img/logo.png')}}" style="height: 150px">
    </div>
    <div class="row justify-content-center mt-5">
        <h1 style="font-weight: bold" >
            Welcome {{ Auth::user()->name }} 
        </h1>
    </div>
</div>
@endsection
