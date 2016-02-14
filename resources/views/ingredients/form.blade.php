@extends('layouts.generic')

@section('content')

    @include('ingredients.partials._form',$view_data)

@endsection

@include('errors.generic_form')
