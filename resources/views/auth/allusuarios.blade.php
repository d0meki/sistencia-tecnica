@extends('layouts.myLayout')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Usuarios</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nombre</th>
                                    <th>apelllido</th>
                                    <th>ci</th>
                                    <th>email</th>
                                    <th>telefono</th>
                                    <th>direccion</th>
                                    <th>role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->nombre}}</td>
                                    <td>{{$user->apelllido}}</td>
                                    <td>{{$user->ci}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->direccion}}</td>
                                    @if(count($user->roles) > 0)
                                    <td>{{$user->roles[0]->role->rol}}</td>
                                    @else
                                    <td>No tiene rol</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
