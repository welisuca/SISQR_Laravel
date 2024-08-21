@extends('adminlte::page')

@section('title', 'Adm Usuarios')

@section('content_header')
    <h1>Listado de Usuarios</h1>
    <br>
    <a href="{{ route('user.create')}}" class="btn btn-success">Crear nuevo usuario</a>
@stop

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Codtip_doc</th>
            <th scope="col">Ndocum</th>
            <th scope="col">Fecha_exp</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Fecha_nac</th>
            <th scope="col">Sexo</th>
            <th scope="col">Celular</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Codtip_usu</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Accioin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->Codtip_doc }}</td>
            <td>{{ $user->Ndocum }}</td>
            <td>{{ $user->Fecha_exp }}</td>
            <td>{{ $user->Nombres }}</td>
            <td>{{ $user->Apellidos }}</td>
            <td>{{ $user->Fecha_nac }}</td>
            <td>{{ $user->Sexo }}</td>
            <td>{{ $user->Celular }}</td>
            <td>{{ $user->Ciudad }}</td>
            <td>{{ $user->Codtip_usu}}</td>
            <td>{{ $user->Email }}</td>
            <td>{{ $user->Password }}</td>
            <td>
                <a href="#" class="btn btn-success"><i class="fa fa-eye"></i></a>
                <a href="{{ route('users.edit',$user)}}" class="btn btn-secondary"><i class="fa fa-marker"></i></a> 
                <a href="#" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links()}}
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="http://kit.fontawesome.com/424ce1386e.js" crossorigin="anonymous"></script>
@stop
