@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Employee</h1>
        </div>
        <div>
            <h3>Edit Employee</h3>
            <form action="{{ route('employee.update', ['employee' => $employee->id]) }}" method="POST"
                accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                @include('employee.partialform')
            </form>
        </div>

    </div>
@endsection
