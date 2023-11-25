@extends('layouts.myLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Agregar Posision Al Tecnico!!. <small>With custom checbox and radion elements.</small></h5>
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
                        <form action="{{route('tecnicos.store_lat_lng')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" name="id" value="{{$tecnico->id}}">
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Latitud</label>
                                <div class="col-sm-10"><input type="number" name="latitud" class="form-control" step="any"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Longitud</label>
                                <div class="col-sm-10"><input type="number" name="longitud" class="form-control" step="any"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="text-center">
                                <button class="btn btn-white btn-sm" type="button">Cancel</button>
                                <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
