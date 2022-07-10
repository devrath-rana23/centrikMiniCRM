@extends('layouts.app')

@section('content')
    <div class="list-container">
        <div class='list-header'>
            <div>
                <h1>Company List</h1>
            </div>
            <div>
                <a href="{{ route('company.create') }}">Add</a>
            </div>
        </div>
        <div class="list-body">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Logo</th>
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
                                <td><img class="list-image" src=" {{ url('storage/' . $company->logo) }}" alt=""
                                        srcset=""></td>
                                <td>{{ $company->address }}</td>
                                <td>{{ $company->website }}</td>
                                <td>{{ $company->email }}</td>
                                <td colspan="3"><a href="javascript:void(0);"
                                        onclick="event.preventDefault();document.getElementById('edit-company-form-{{ $company->id }}').submit();">EDIT</a>
                                    <form style="display: none;" id="edit-company-form-{{ $company->id }}"
                                        action="{{ route('company.edit', ['company' => $company->id]) }}" method="GET">
                                        @csrf
                                    </form>
                                    <a href="javascript:void(0);"
                                        onclick="event.preventDefault();document.getElementById('delete-company-form-{{ $company->id }}').submit();">DELETE</a>
                                    <form style="display: none;" id="delete-company-form-{{ $company->id }}"
                                        action="{{ route('company.destroy', ['company' => $company->id]) }}"
                                        method="DELETE">
                                        @csrf
                                    </form>
                                    <a href="{{ route('company.show', ['company' => $company->id]) }}">INFO</a>
                                </td>
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
