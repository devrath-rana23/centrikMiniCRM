@extends('layouts.app')

@section('content')
    <div class="list-container">
        <div class='list-header'>
            <div>
                <h1>Company List</h1>
            </div>
            <div>
                <a href="{{route('company.create')}}">Add</a>
            </div>
        </div>
        <div class="list-body">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($companies->count() > 0)
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->website }}</td>
                                <td>{{ $company->email }}</td>
                                <td colspan="3">EDIT DELETE INFO</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{ $companies->links() }}
    </div>
@endsection
