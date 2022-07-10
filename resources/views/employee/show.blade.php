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
                    <h3>{{ config('appplaceholder.NAME') }} - {{ $employee->name }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.LOGO') }} - <img class="list-image"
                            src="{{ url('storage/' . $employee->logo) }}" alt="" srcset=""></h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.ADDRESS') }} - {{ $employee->address }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.WEBSITE') }} - {{ $employee->website }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.EMAIL') }} - {{ $employee->email }}</h3>
                </div>
            </div>

        </div>

    </div>
@endsection
