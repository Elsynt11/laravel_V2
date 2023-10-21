@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lista de estados</h1>
            <div style="text-align: center;">
                <datatable-component></datatable-component>
            </div>
        </div>
    </div>
</div>
@endsection
