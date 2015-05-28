<meta name="_token" content="{{csrf_token()}}"/>
@extends('layouts.default')

@section('content')


    <div class="row">
        {!! Form::open(['class' => 'form-inline',
        'id' => 'grade-class-form']) !!}

        <div class="form-group">
            {!! Form::label('lblSelectGrade', '年级：') !!}
            {!! Form::select('selSelectGrade', $grades, null, ['onchange'=>'getClassesFromGrade()',
            'class' => 'form-control selSelectGrade',
            'id' => 'selSelectGrade']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('lblSelectClass', '班级：') !!}
            {!! Form::select('selSelectClass', array(), null, ['onchange' => 'getStudentsFromClass()',
            'class' => 'form-control selSelectClass',
            'id' => 'selSelectClass',
            'disabled' => 'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('lblSelectShowOrder', '学生排序：') !!}
            {!! Form::select('selSelectShowOrder', array("学科网默认顺序", "总成绩低到高", "总成绩高到低"), null, [
            'class' => 'form-control selSelectShowOrder',
            'id' => 'selSelectShowOrder']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    <div class="row">
        {!! Form::open(['class' => 'form-inline',
        'id' => 'standard-form',
        'method' => 'post',
        'route' => 'scoretograde.getStandard']) !!}

        <div class="form-group">
            {!! Form::label('', '评分标准：', ['id' => '',
            'class' => 'control-label']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'A：', ['class' => 'control-label']) !!}
            {!! Form::text("txt-standard-A-up", null, ['id' => 'txt-standard-A-up',
            'class' => 'form-control standard',
            'way-data' => 'A-to-B']) !!}
            {!! Form::label('', '以上', ['class' => 'control-label']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'B：', ['class' => 'control-label']) !!}
            {!! Form::text("txt-standard-B-up", null, ['id' => 'txt-standard-B-up',
            'class' => 'form-control standard',
            'way-data' => 'A-to-B']) !!}
            {!! Form::label('', '～', ['class' => 'control-label']) !!}
            {!! Form::text("txt-standard-B-down", null, ['id' => 'txt-standard-B-down',
            'class' => 'form-control standard',
            'way-data' => 'B-to-C']) !!}
            {!! Form::label('', '『含』', ['class' => 'control-label']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'C：', ['class' => 'control-label']) !!}
            {!! Form::text("txt-standard-C-up", null, ['id' => 'txt-standard-C-up',
            'class' => 'form-control standard',
            'way-data' => 'B-to-C']) !!}
            {!! Form::label('', '～', ['class' => 'control-label']) !!}
            {!! Form::text("txt-standard-C-down", null, ['id' => 'txt-standard-C-down',
            'class' => 'form-control standard',
            'way-data' => 'C-to-D']) !!}
            {!! Form::label('', '『含』', ['class' => 'control-label']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('', 'D：', ['class' => 'control-label']) !!}
            {!! Form::text("txt-standard-D-down", null, ['id' => 'txt-standard-D-down',
            'class' => 'form-control standard',
            'way-data' => 'C-to-D']) !!}
            {!! Form::label('', '以下', ['class' => 'control-label']) !!}
        </div>
        <div class="form-group">

            {!! Form::button("确定并核算等级／刷新", ['id' => 'btn-submit',
            'class' => 'btn btn-primary', 'onclick' => 'onSubmitStandardClick()']) !!}

        </div>
        {!! Form::close() !!}
    </div>




    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>姓名</th>
                <th>最后等级</th>
                <th>总成绩</th>
                <th>作业成绩</th>
                <th>表现成绩</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>



@include('students.partials.modal')



@stop

@section('javascript')
    <script src="../js/students.js"></script>

@stop
