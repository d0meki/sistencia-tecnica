@extends('layouts.myLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(isset($taller))
        <div class="col-md-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Detalle del Taller</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-fluid" src="img/profile_big.jpg">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{$taller->nombre}}</strong></h4>
                        <p><i class="fa fa-map-marker"></i> {{$taller->direccion}}</p>
                        <p><i class="fa fa-address-card"></i> {{$taller->nit}}</p>
                        <p><i class="fa fa-phone"></i> {{$taller->telefono}}</p>
                        <h5>
                            About me
                        </h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitat.
                        </p>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <a type="button" href="{{route('tecnicos.index')}}"  class="btn btn-primary btn-sm btn-block"><i class="fa fa-wrench"></i> Mis Tecnicos</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Al Parecer no Tienes un taller registrado</h5>
                </div>
                <div class="ibox-content float-e-margins">
                    <p>
                        <a type="button" href="{{route('taller.create')}}" class="btn btn-block btn-outline btn-primary">Registrar mi Taller!!</a>
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
