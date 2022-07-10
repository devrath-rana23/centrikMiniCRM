@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Company</h1>
        </div>
        <div>
            <h3>Company Details</h3>
            <form action="{{ route('company.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data"
                role="form">
                @csrf
                <div>
                    <input placeholder="{{ config('appplaceholder.NAME') }}" type="text" name="name"
                        class="@error('name') is-invalid @enderror">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input placeholder="{{ config('appplaceholder.ADDRESS') }}" type="text" name="address"
                        class="@error('address') is-invalid @enderror">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input placeholder="{{ config('appplaceholder.WEBSITE') }}" type="text" name="website"
                        class="@error('website') is-invalid @enderror">
                    @error('website')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input placeholder="{{ config('appplaceholder.EMAIL') }}" type="text" name="email"
                        class="@error('email') is-invalid @enderror">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <input placeholder="{{ config('appplaceholder.LOGO') }}" type="file" name="logo"
                        class="@error('logo') is-invalid @enderror" class="@error('name') is-invalid @enderror">
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
