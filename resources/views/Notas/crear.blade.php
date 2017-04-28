
@extends('layouts.form') 

@section('form-content')
    @define $pageTitle = 'Crear Notas'
    

     <form action="/notas" method="Post" role="form">
      {{ csrf_field()}}
      
       
     

@endsection