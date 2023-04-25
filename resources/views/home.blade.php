@extends('master')

@section('body')
    <h1>Home</h1>
    <hr />
    <form action="/add-employee" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required />
        <input type="submit" class="btn" value="Add Employee" />
    </form>
    <hr />
    <form action="/add-time-record" method="POST">
        @csrf
        <select name="employee_id" required>
            @foreach ($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
            @endforeach
        </select>
        {{-- <input type="time" name="enter" value="{{ date('H:i:s') }}" placeholder="Enter" required />
        <input type="time" name="exit" value="{{ date('H:i:s') }}" placeholder="Exit" required /> --}}
        <input type="submit" class="btn" value="Add Time Record" />
    </form>
    <hr />
    @foreach ($timesheet as $record)
        <form action="/update-time-record" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $record->id }}">
            <label for="">{{ $record->name }}</label>
            <input type="time" name="enter" value="{{ $record->enter }}" />
            <input type="time" name="exit" value="{{ $record->exit }}" />
            <input type="submit" value="Update" />
        </form>
        <form action="/remove-time-record" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $record->id }}">
            <input type="submit" value="Remove" />
        </form>
    @endforeach
@endsection
