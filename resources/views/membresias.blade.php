@extends('layouts.login')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Unstyled list</h5>
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
                <div class="text-center">
                    <span>
                        Mensual
                    </span>
                    <h2 class="font-bold">
                        $9,99
                    </h2>
                </div>

                <ol>
                    <li>But I must explain </li>
                    <li>To you how all this mistaken</li>
                    <li>Idea of denouncing pleasure </li>
                    <li>Great explorer of the truth</li>
                    <li>To take a trivial example
                        <ol>
                            <li>Or one who avoids a pain</li>
                            <li>Indignation and dislike men</li>
                            <li>Nor again is there anyone </li>
                            <li>But who has any right</li>
                        </ol>
                    </li>
                    <li>That they cannot foresee</li>
                    <li>Who avoids a pain that produceg</li>
                    <li>Consequences that are extremely </li>
                </ol>


                <hr />
                <span class="text-muted small">
                    *For United States, France and Germany applicable sales tax will be applied
                </span>
                <div class="m-t-sm text-center">
                    <div class="btn-group">
                        <a href="{{route('payment.index',9.99)}}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Suscribirse</a>
                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Unordered list</h5>
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
                <div class="text-center">
                    <span>
                        3 Meses
                    </span>
                    <h2 class="font-bold">
                        $19,99
                    </h2>
                </div>

                <ol>
                    <li>But I must explain </li>
                    <li>To you how all this mistaken</li>
                    <li>Idea of denouncing pleasure </li>
                    <li>Great explorer of the truth</li>
                    <li>To take a trivial example
                        <ol>
                            <li>Or one who avoids a pain</li>
                            <li>Indignation and dislike men</li>
                            <li>Nor again is there anyone </li>
                            <li>But who has any right</li>
                        </ol>
                    </li>
                    <li>That they cannot foresee</li>
                    <li>Who avoids a pain that produceg</li>
                    <li>Consequences that are extremely </li>
                </ol>


                <hr />
                <span class="text-muted small">
                    *For United States, France and Germany applicable sales tax will be applied
                </span>
                <div class="m-t-sm text-center">
                    <div class="btn-group">
                        <a href="{{route('payment.index',19.99)}}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Suscribirse</a>
                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Ordered list</h5>
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
                <div class="text-center">
                    <span>
                        1 año
                    </span>
                    <h2 class="font-bold">
                        $59,99
                    </h2>
                </div>
                <ol>
                    <li>But I must explain </li>
                    <li>To you how all this mistaken</li>
                    <li>Idea of denouncing pleasure </li>
                    <li>Great explorer of the truth</li>
                    <li>To take a trivial example
                        <ol>
                            <li>Or one who avoids a pain</li>
                            <li>Indignation and dislike men</li>
                            <li>Nor again is there anyone </li>
                            <li>But who has any right</li>
                        </ol>
                    </li>
                    <li>That they cannot foresee</li>
                    <li>Who avoids a pain that produceg</li>
                    <li>Consequences that are extremely </li>
                </ol>


                <hr />
                <span class="text-muted small">
                    *For United States, France and Germany applicable sales tax will be applied
                </span>
                <div class="m-t-sm text-center">
                    <div class="btn-group">
                        <a href="{{route('payment.index',59.99)}}" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Suscribirse</a>
                        <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
