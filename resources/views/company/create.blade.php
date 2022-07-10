@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Company</h1>
        </div>
        <div>
            <h3>Add Company</h3>
            <form action="{{ route('company.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" role="form">
                @csrf
                <div>
                    <input type="text" name="name" class="@error('name') is-invalid @enderror">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="address">
                </div>
                <div>
                    <input type="text" name="website">
                </div>
                <div>
                    <input type="text" name="email">
                </div>
                <div>
                    <input type="file" name="logo" class="@error('logo') is-invalid @enderror">
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button>Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection
