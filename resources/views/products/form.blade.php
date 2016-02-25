@extends('layouts.generic')

@section('content')

    @include('errors.generic_form')
    @include('products.partials._form',$view_data)

@endsection
<script src="{{ asset('js/jquery.js') }}"></script>
