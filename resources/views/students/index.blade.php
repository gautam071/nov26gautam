@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between mb-5">
        <h2>Student Details</h2>
        <a href="{{ route('student.create') }}">
            <button class="btn btn-success"><i class="fa">&#xf067;</i> Add New Student</button>
        </a>
    </div>
    <table class="table table-bordered table-responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Country</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
            @php $count = 1; @endphp
            @foreach ($students as $student)
            <tr>
                <td>{{ $count }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address ?? '-' }}</td>
                <td>{{ $student->city ?? '-' }}</td>
                <td>{{ $student->state ?? '-' }}</td>
                <td>{{ $student->country ?? '-' }}</td>
                <td>{{ $student->status }}</td>
                <td>
                    <div class="d-flex gap-3">
                        <a href="{{ route('student.edit', $student->id) }}">
                            <button type="submit" class="btn btn-info"><i class="fa">&#xf044;</i></button>
                        </a>
                        <form action="{{ route('student.destroy', $student->id ) }}" method="POST" class="ajax">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa">&#xf014;</i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @php $count = $count + 1; @endphp
            @endforeach
        <tbody>
        </tbody>
    </table>
</div>
@endsection
