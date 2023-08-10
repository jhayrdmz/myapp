@extends('components.layouts.main')

@section('content')
    @include('components.layouts.sidebar')

    {{ $slot }}
@endsection