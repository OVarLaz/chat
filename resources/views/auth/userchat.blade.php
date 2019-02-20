@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Guardando datos para conversacion con Ejecutivo</h1>
                </div>
                <div class="panel-body">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control"
                                type="name" 
                                name="name" 
                                id="name"
                                placeholder="Ingrese su nombre">
                            {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input class="form-control"
                                type="dni" 
                                name="dni"
                                id="dni" 
                                placeholder="Ingrese su DNI">
                            {!! $errors->first('dni', '<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control"
                                type="email" 
                                name="email" 
                                id="email"
                                placeholder="Ingrese su email">
                            {!! $errors->first('email', '<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input class="form-control"
                                type="phone" 
                                name="phone" 
                                id="phone"
                                placeholder="Ingrese su telefono">
                            {!! $errors->first('phone', '<span class="help-block">:message</span>')!!}
                        </div>
                        <button class="btn btn-primary btn-block saveusuario">Iniciar conversacion</button>
                </div>
            </div>
        </div>

    </div>

@endsection 
