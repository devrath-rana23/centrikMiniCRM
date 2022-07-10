@extends('layouts.app')

@section('content')
    <div class="list-container">
        <div class='list-header'>
            <div>
                <h1>Employee List</h1>
            </div>
            <div>
                <a href="{{ route('employee.create') }}">Add</a>
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
                    @if ($employees->count() > 0)
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td><img class="list-image" src=" {{ url('storage/' . $employee->logo) }}" alt=""
                                        srcset=""></td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->website }}</td>
                                <td>{{ $employee->email }}</td>
                                <td colspan="3"><a href="javascript:void(0);"
                                        onclick="event.preventDefault();document.getElementById('edit-employee-form-{{ $employee->id }}').submit();">EDIT</a>
                                    <form style="display: none;" id="edit-employee-form-{{ $employee->id }}"
                                        action="{{ route('employee.edit', ['employee' => $employee->id]) }}" method="GET">
                                        @csrf
                                    </form>
                                    <a href="javascript:void(0);"
                                        onclick="event.preventDefault();document.getElementById('delete-employee-form-{{ $employee->id }}').submit();">DELETE</a>
                                    <form style="display: none;" id="delete-employee-form-{{ $employee->id }}"
                                        action="{{ route('employee.destroy', ['employee' => $employee->id]) }}"
                                        method="DELETE">
                                        @csrf
                                    </form>
                                    <a href="{{ route('employee.show', ['employee' => $employee->id]) }}">INFO</a>
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
        {{ $employees->links() }}
    </div>
@endsection
