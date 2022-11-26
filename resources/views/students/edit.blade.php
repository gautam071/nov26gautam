@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Edit Student "{{ $student['name'] }}"</h2>
    </div>


    <form action="{{ route('student.update', $student->id ) }}" enctype="multipart/form-data" method="POST" class="ajax">
        @csrf
        @method('PATCH')
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">{{ __('Name*') }}</label>
                    <input type="name" class="form-control" placeholder="Student Name" id="name" name="name" value="{{ $student->name }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">{{ __('Email*') }}</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" value="{{ $student->email }}" placeholder="Student Email Address">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">{{ __('Phone*') }}</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="9090992912" value="{{ $student->phone }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="address">{{ __('Address') }}</label>
                    <input type="text" class="form-control" placeholder="Address" id="address" value="{{ $student->address }}" name="address">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for='city'>{{ __('City') }}</label>
                    <input type="text" class="form-control" placeholder="City" id="city" name="city" value="{{ $student->city }}">
                </div>
                <div class="form-group col-md-6">
                    <label for='state'>{{ __('States') }}</label>
                    <input type="text" class="form-control" placeholder="State" id="state" name="state" value="{{ $student->state }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="country">{{ __('Country') }}</label>
                    <input type="text" class="form-control" placeholder="Country" id="country" name="country" value="{{ $student->country }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">{{ __(('Status*')) }}</label>
                    <select name="status" required id="status" class="form-control select2-single" required>
                        <option value="">Select a Status*</option>
                        <option value="active" <?php echo $student->status == 'active' ? "selected" : ""?> >Active</option>
                        <option value="inactive" <?php echo $student->status == 'inactive' ? "selected" : "";?> >In Active</option>
                    </select>
                </div>
            </div>
            @foreach ($student->subjects as $subject)
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="{{ $subject->name }}">{{ __('Subject Name*') }}</label>
                        <input type="text" class="form-control" id="{{ $subject->name }}" name="subject[{{ $subject->name }}][name]" value="{{ $subject->name }}" readonly required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="{{ $subject->name }}_mark">{{ __('Mark*') }}</label>
                        <input type="number" class="form-control" placeholder="Mark" id="{{ $subject->name }}_mark" name="subject[{{ $subject->name }}][mark]" min="1" max="3" value="{{ $subject->marks }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="{{ $subject->name }}_grade">{{ __('Grade*') }}</label>
                        <input type="text" class="form-control" id="{{ $subject->name }}_grade" name="subject[{{ $subject->name }}][grade]" value="{{ $subject->grade }}" placeholder="A+" maxlength="2" required>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"></i>{{ __('Update') }}</button>
        </div>
    </form>
<div>
@endsection