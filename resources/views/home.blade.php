@extends('teacher.layouts.app')

@section('content')
@if (Auth::user()->hasAnyRole('super-admin', 'guru'))
@include('teacher.index')
@endif

@endsection