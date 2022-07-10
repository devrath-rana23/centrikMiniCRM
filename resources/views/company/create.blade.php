@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Company</h1>
        </div>
        <div>
            <h3>Add Company</h3>
            <form action="{{ route('company.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data"
                role="form">
                @csrf
                @include("company.partialform")
            </form>
        </div>

    </div>
@endsection
