@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Company</h1>
        </div>
        <div>
            <h3>Company Details</h3>
            <div>
                <div>
                    <h3>{{ config('appplaceholder.NAME') }} - {{ $company->name }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.LOGO') }} - <img class="list-image"
                            src="{{ url('storage/' . $company->logo) }}" alt="" srcset=""></h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.ADDRESS') }} - {{ $company->address }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.WEBSITE') }} - {{ $company->website }}</h3>
                </div>
                <div>
                    <h3>{{ config('appplaceholder.EMAIL') }} - {{ $company->email }}</h3>
                </div>
            </div>

        </div>

    </div>
@endsection
