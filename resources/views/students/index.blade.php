@extends('layouts.default')

@section('content')

    {!! Form::open() !!}
        {!! Form::select('SelectGrade', [1, 2, 3, 4, 5, 6]) !!}
    {!! Form::close() !!}

    @foreach($students as $student)
{{ $student['Sname'] . ' ' . $student['Sscore'] . ' ' . $student['Sattitude']}}

    @endforeach
@stop