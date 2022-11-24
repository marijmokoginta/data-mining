@extends('layouts.app')

@section('content')
@if (Auth::user()->hasAnyRole('super-admin', 'guru'))
@include('teacher.index')
@elseif(Auth::user()->hasRole('siswa'))
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>

    <div class="col-md-8">
    </div>
</div>
@endif

@endsection