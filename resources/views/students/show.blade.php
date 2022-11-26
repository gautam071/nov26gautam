@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <h2>Student Details</h2>
    </div>
    <div class="card">
        <div class="card-header">
            <span>{{ $student->name }} Details</span>
        </div>
        <div class="card-body">
                <p><span class="fw-bold">Name: </span>{{ $student->name }}</p>
                <p><span class="fw-bold">Email: </span> {{ $student->email }}</p>
                <p><span class="fw-bold">Phone: </span> {{ $student->phone }}</p>
                <p><span class="fw-bold">Address: </span> {{ $student->address }}</p>
                <p><span class="fw-bold">City: </span> {{ $student->city }}</p>
                <p><span class="fw-bold">State: </span> {{ $student->state ?? '-' }}</p>
                <p><span class="fw-bold">Country: </span> {{ $student->country ?? '-' }}</p>
                <p><span class="fw-bold">Status: </span> {{ $student->status }}</p>

            <h4>Marks:</h4>
            <div class="d-flex justify-content-between">
                @foreach($subjects as $key => $value)
                <div class="d-flex flex-column">
                    <p><span class="fw-bold">Subject: </span>{{ $value->name }}</p>
                    <p><span class="fw-bold">{{ $value->name }} Mark:</span>{{ $value->marks }}</p>
                    <p><span class="fw-bold">{{ $value->name }} Grade:</span>{{ $value->grade }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
