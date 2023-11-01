@extends('master_layout.index')

@section('header')
    <link href="{{ URL::asset('css/form.css') }}" rel="stylesheet" />
@endsection

@section('content')
    @php($employeeId = $employee->id)
    <div class="bg-light">
        <a href="{{ route('form', ['id' => $employeeId]) }}">Request form</a>
        <a href="{{ route('request_list', ['id' => $employeeId]) }}">Request table</a>
        @if ($employee->role == 1)
            <a href="{{ route('manager_request_list', ['id' => $employeeId]) }}">Request table</a>
        @endif
    </div>

    <form class="form_container" action="{{ route('form') }}" method="post">
        @csrf
        <input name="employee_id" value="{{ $employeeId }}" type="hidden" />
        <h1 class="form_title">Leave Request</h1>
        <div class="mb-3">
            <label for="nameInput" class="form-label">Full name</label>
            <input
                type="name"
                class="form-control"
                id="nameInput"
                aria-describedby="emailHelp"
            />
        </div>
        <div class="mb-3">
            <label for="birthday">From</label>
            <input type="date" id="birthday" name="start_date" />
            <label for="birthday">To</label>
            <input type="date" id="birthday" name="end_date" />
        </div>
        <div class="mb-3">
            <label class="form-label">Remaining days: 3 days</label>
        </div>
        <div class="mb-3">
            <label for="textareaInput" class="form-label">Reason</label>
            <textarea
                id="textareaInput"
                name="reason"
                rows="4"
                cols="50"
            ></textarea>
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Submit
        </button>
    </form>
@endsection
