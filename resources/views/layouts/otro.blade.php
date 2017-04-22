@extends('layouts.app')

 @section('content')
<div class="panel panel-info col-md-12">
  <div class="panel-heading">{{$pageTitle}}</div>
  <div class="panel-body">

    @yield('form-content') 
    
  </div>
</div>


@endsection


@section('script-validacion')
@if (count($errors) > 0)

  <script>
      var errors = convertToJson('{{ ( $errors->toJson()) }}') 
      showError(errors);
     
  </script>
@endif
@endsection