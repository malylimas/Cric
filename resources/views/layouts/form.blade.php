@extends('layouts.app')

 @section('content')
<div class="panel panel-info col-md-8 col-md-offset-2">
  <div class="panel-heading">{{$pageTitle}}</div>
  <div class="panel-body">

    @yield('form-content') 
    
  </div>
</div>


@endsection


@section('script')
@if (count($errors) > 0)

  <script>
      var search = '&quot;';
      var replace = '"'
      var jsonString = '{{ ( $errors->toJson()) }}'.split(search).join(replace);

      var errors = JSON.parse(jsonString);

      showError(errors);
     
  </script>
    @endif
@endsection