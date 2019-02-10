@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Register as</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('register') }}">
                        <a class="btn btn-primary" href="{{ url('register?type=u') }}">Health care Professionals</a>
                        <a class="btn btn-primary" href="{{ url('register?type=h') }}">Medical Facility</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
