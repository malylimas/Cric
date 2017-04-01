@extends('layouts.app') @section('content')
<div class="panel panel-info col-md-8 col-md-offset-2">
  <div class="panel-heading">{{$pageTitle}}</div>
  <div class="panel-body">

    @yield('form-content') 
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>      
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

      </ul>
    </div>
    @endif
    
  </div>
</div>
@endsection