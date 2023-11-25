@extends('layouts.myLayout')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>
                    <a href="{{ route('tecnicos.create') }}" type="submit" class="btn btn-primary ml-2">
                        Agrrgar Tecnicos
                    </a>

                    <a href="{{ route('tecnicos.all_tecnicos_map') }}" type="submit" class="btn btn-info ml-2">
                        Ver a todos mis tecnicos en el Mapa
                    </a>
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
                                    <th>Nombre y Apellido</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>latitud</th>
                                    <th>longitud</th>
                                    <th>Disponibilidad</th>
                                    <th>Posision en el Mapa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($tecnicos) == 0)
                                <tr>
                                    <td colspan="5"><h4>No hay tecnicos</h4></td>
                                </tr>
                                @else
                                @foreach ($tecnicos as $tec)
                                <tr>
                                    <td>{{$tec->user->nombre}}</td>
                                    <td>{{$tec->user->telefono}}</td>
                                    <td>{{$tec->user->email}}</td>
                                    <td>{{$tec->latitud}}</td>
                                    <td>{{$tec->longitud}}</td>
                                    <td>disponible</td>
                                    <td class="text-center"><a href="{{route('tecnicos.mapa', $tec->id)}}"><i class="fa fa-map"></i></a></td>
                                    <td><a href="{{route('tecnicos.edit', $tec->id)}}">add lat and lng</a></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <!--  <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr> -->
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
