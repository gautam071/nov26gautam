@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Add New Student</h2>
    </div>
    <form action="{{ route('student.store') }}" method="POST" class="ajax">
        @csrf
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">{{ __('Name*') }}</label>
                    <input type="name" class="form-control" placeholder="Student Name" id="name" name="name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">{{ __('Email*') }}</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Student Email Address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">{{ __('Phone*') }}</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="9090992912" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="address">{{ __('Address') }}</label>
                    <input type="text" class="form-control" placeholder="Address" id="address" name="address">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for='city'>{{ __('City') }}</label>
                    <input type="text" class="form-control" placeholder="City" id="city" name="city">
                </div>
                <div class="form-group col-md-6">
                    <label for='state'>{{ __('States') }}</label>
                    <input type="text" class="form-control" placeholder="State" id="state" name="state">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="country">{{ __('Country') }}</label>
                    <input type="text" class="form-control" placeholder="Country" id="country" name="country">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">{{ __(('Status*')) }}</label>
                    <select name="status" required id="status" class="form-control select2-single" required>
                        <option value="">Select a Status*</option>
                        <option value="active">Active</option>
                        <option value="inactive">In Active</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
            @foreach(config('constants.subjects') as $key => $subjectName)
                <div class="form-group col-md-4">
                    <label for="{{ $key }}">{{ __('Subject Name*') }}</label>
                    <input type="text" class="form-control" id="{{ $key }}" name="subject[{{ $key }}][name]" value="{{ $subjectName }}" readonly required>
                </div>
                <div class="form-group col-md-4">
                    <label for="{{ $key }}_mark">{{ __('Mark*') }}</label>
                    <input type="number" class="form-control" placeholder="Mark" id="{{ $key }}_mark" name="subject[{{ $key }}][mark]" min="1" max="3" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="{{ $key }}_grade">{{ __('Grade*') }}</label>
                    <input type="text" class="form-control" id="{{ $key }}_grade" name="subject[{{ $key }}][grade]" maxlength="2" placeholder="A+" required>
                </div>
            @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"></i>{{ __('Save') }}</button>
        </div>
    </form>
<div>
@endsection