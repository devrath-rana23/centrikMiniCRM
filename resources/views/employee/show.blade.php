@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Employee</h1>
        </div>
        <div>
            <h3>Employee Details</h3>
            <div>
                <div>
                    <h3>{{ config('appplaceholder.NAME') }} - {{ $employee->first_name }} {{ $employee->last_name }}
                    </h3>
                </div>
                <div>
                    <h3>Phone - {{ $employee->phone }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.EMAIL') }} - {{ $employee->email }}</h3>
                </div>
            </div>

        </div>

    </div>
@endsection
