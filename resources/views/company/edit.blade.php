@extends('layouts.app')

@section('content')
    <div class="create-container">
        <div>
            <h1>Company</h1>
        </div>
        <div>
            <h3>Edit Company</h3>
            <form action="{{ route('company.update', ['company' => $company->id]) }}" method="POST" accept-charset="UTF-8"
                enctype="multipart/form-data" role="form">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                @include('company.partialform')
            </form>
        </div>

    </div>
@endsection
