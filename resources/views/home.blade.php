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
        <label style="width: 3em !important;display:inline-block">{{ $record->id }}</label>
        <label style="width: 8em !important;display:inline-block">{{ $record->name }}</label>
        <form action="/record/update" method="POST" style="display: inline-block">
            @csrf
            <input type="hidden" name="id" value="{{ $record->id }}">
            <input type="datetime" name="enter" value="{{ $record->enter }}" placeholder="0000-00-00 00:00:00"/>
            <input type="datetime" name="exit" value="{{ $record->exit }}" placeholder="0000-00-00 00:00:00"/>
            <input type="submit" value="Update" />
        </form>
        <form action="/record/remove" method="POST" style="display: inline-block">
            @csrf
            <input type="hidden" name="id" value="{{ $record->id }}">
            <input type="submit" value="Remove" />
        </form>
        <br />
        <br />
    @endforeach
@endsection
