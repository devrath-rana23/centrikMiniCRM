@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Employee</h1>
        </div>
        <div>
            <h3>Add Employee</h3>
            <form action="{{ route('employee.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data"
                role="form">
                @csrf
                <input type="hidden" name="create_employee" value="1">
                @include('employee.partialform')
            </form>
        </div>

    </div>
@endsection
