@extends('layouts.generic')

@section('content')

    @include('errors.generic_form')
    @include('ingredients.partials._form',$view_data)

@endsection
