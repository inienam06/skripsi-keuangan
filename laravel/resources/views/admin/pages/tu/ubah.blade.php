@extends('admin.template')

@section('header')
<h1>
    Ubah Tata Usaha
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Tata Usaha</a></li>
    <li class="active">Ubah</li>
</ol>
@endsection

@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">
                Ubah
            </h3>
        </div>

        <div class="box-body">
            {!! Form::model($data, ['method' => 'POST', 'route' => ['admin.tu.perbarui', $id]]) !!}
                @include('errors.msg')
                @include('admin.pages.tu.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection