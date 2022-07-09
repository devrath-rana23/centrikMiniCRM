@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <div>
            <div class="index-content">
                {{ __('Dashboard') }}
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="dashboard-content">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
@endsection
