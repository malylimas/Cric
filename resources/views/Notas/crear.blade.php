
@extends('layouts.otro') 

@section('form-content')
    @define $pageTitle = 'Ingresar notas de ' . $clase->nombre . ' del ' . $grado->nombre
    

     <form action="/notas?claseId={{$clase->id}}" method="Post" role="form">
      {{ csrf_field()}}

      <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <center><b>#</center></b></th>

                        <th>
                            <center><b>Alumno</center></b></th>

                            <th><center><b>Primer Parcial</b></center></th>
                            <th><center><b>Segundo Parcial</b></center></th>
                            <th><center><b>Tercer Parcial</b></center></th>
                            <th><center><b>Cuarto Parcial</b></center></th>
                            <th><center><b>Promedio</b></center></th>                            
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->id}}</td>
                        <td>{{$alumno->alumno->nombre}}</td>
                        <td>
                            <input type="hidden" name="matricula[]" value="{{$alumno->id}}">
                            <div class="form-group">
                                
                                <input type="number"  name="primero[]" min="0" max="100" class="form-control" value="{{array_get($alumno->notas->where('clase_id',$clase->id)->first(),'primerParcial',0)}}">
                            </div>
                             <td>
                            
                            <div class="form-group">
                                
                                <input type="number"  name="segundo[]" min="0" max="100" class="form-control" value="{{array_get($alumno->notas->where('clase_id',$clase->id)->first(),'segundoParcial',0)}}">
                            </div>
                        </td>  
                        <td>
                            
                            <div class="form-group">
                                
                                <input type="number"  name="tercero[]" min="0" max="100" class="form-control" value="{{array_get($alumno->notas->where('clase_id',$clase->id)->first(),'tercerParcial',0)}}">
                            </div>
                        </td>  
                        <td>
                            
                            <div class="form-group">
                                
                                <input type="number"  name="cuarto[]" min="0" max="100" class="form-control" value="{{array_get($alumno->notas->where('clase_id',$clase->id)->first(),'cuartoParcial',0)}}" >
                            </div>
                        </td>

                        <td>
                            
                           {{array_get($alumno->notas->where('clase_id',$clase->id)->first(),'promedio',0)}}
                        </td>      
                        </td>   
                              
                      
                        
                    </tr>
                    @endforeach
                </tbody>
    </table>

      <button class="btn btn-primary"> Guardar</button>
    
    </form>
       
     

@endsection