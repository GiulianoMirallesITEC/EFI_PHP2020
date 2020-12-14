@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

<div class="container">

    @if(Session::has('Mensaje'))

        <div class="alert alert-success" role="alert">
            {{Session::get('Mensaje')}}
        </div>

    @endif

    <div class="p-4">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url('empleados/create') }}" class="btn btn-success"> Nuevo empleado </a>
            </div>
    <br/>
    <br/>

        <div class="col-md-5">
            <form class="d-flex justify-content-center aling-item-center">
                <div class="form-group d-flex justify-content-center aling-item-center" style="width: 100%;">
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" placeholder="Ingrese el nombre del empleado que desea buscar">
                        <div class="input-group-text bg-white">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <table id="myTable" class="table table-bordered table-hover table-dark table-striped">

        <thead>
            <tr>
                <th class="text-center" >#</th>
                <th class="text-center" >Foto</th>
                <th class="text-center" >Nombre</th>
                <th class="text-center" >Email</th>
                <th class="text-center" >Acciones</th>
            </tr>
        </thead>

        <tbody  > 
        @foreach ($Empleados as $Empleado)
            <tr>
                <td class="text-center" >{{$loop->iteration}}</td>
                <td class="text-center">
                    <img src="{{ asset('storage').'/'.$Empleado->photo }}" class="img-thumbnail img-fluid" alt="" width="100">
                </td>
                <td class="text-center" >{{ $Empleado->name . " " . $Empleado->surname  }}</td>
                <td class="text-center" >{{ $Empleado->email  }}</td>
                <td class="text-center"> 

                    <a class="btn btn-success" href="{{ url('/empleados/'.$Empleado->id.'/edit') }}">
                        Ver
                    </a>

                    <a class="btn btn-primary" href="{{ url('/empleados/'.$Empleado->id.'/edit') }}">
                        Editar
                    </a>

                    <form method="post" action="{{ url('/empleados/'.$Empleado->id)}}" style="display:inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm ('¿Esta seguro de que desea eliminar este registro?');"> Eliminar </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
<div class="row justify-content-center align-items-center">
        {{ $Empleados->links() }}
</div>
    

</div>


@endsection