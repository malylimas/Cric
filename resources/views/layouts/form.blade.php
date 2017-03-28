@extends('layouts.app') 
@section('content')
<div class="panel panel-info col-md-8 col-md-offset-2">
    <div class="panel-heading">{{$pageTitle}}</div>
    <div class="panel-body">

        	 @yield('form-content')
    </div>
</div>
@endsection