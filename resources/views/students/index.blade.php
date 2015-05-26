<meta name="_token" content="{{csrf_token()}}" />
@extends('layouts.default')

@section('content')



                {!! Form::open(['class' => 'form-inline']) !!}


                        {!! Form::label('lblSelectGrade', '年级：') !!}
                        {!! Form::select('selSelectGrade', $grades, null, ['onchange'=>'getClassesFromGrade()',
                        'class' => 'form-control selSelectGrade']) !!}

                        {!! Form::label('lblSelectClass', '班级：') !!}
                        {!! Form::select('selSelectClass', array(), null, ['onchange' => 'getStudentsFromClass()',
                        'class' => 'form-control selSelectClass',
                        'disabled' => 'disabled']) !!}


                {!! Form::close() !!}

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
                'class' => 'form-control standard']) !!}
                {!! Form::label('', '以上', ['class' => 'control-label']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'B：', ['class' => 'control-label']) !!}
                {!! Form::text("txt-standard-B-up", null, ['id' => 'txt-standard-B-up',
                'class' => 'form-control standard']) !!}
                {!! Form::label('', '～', ['class' => 'control-label']) !!}
                {!! Form::text("txt-standard-B-down", null, ['id' => 'txt-standard-B-down',
                'class' => 'form-control standard']) !!}
                {!! Form::label('', '『含』', ['class' => 'control-label']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'C：', ['class' => 'control-label']) !!}
                {!! Form::text("txt-standard-C-up", null, ['id' => 'txt-standard-C-up',
                'class' => 'form-control standard']) !!}
                {!! Form::label('', '～', ['class' => 'control-label']) !!}
                {!! Form::text("txt-standard-C-down", null, ['id' => 'txt-standard-C-down',
                'class' => 'form-control standard']) !!}
                {!! Form::label('', '『含』', ['class' => 'control-label']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', 'D：', ['class' => 'control-label']) !!}
                {!! Form::text("txt-standard-D-down", null, ['id' => 'txt-standard-D-down',
                'class' => 'form-control standard']) !!}
                {!! Form::label('', '以下', ['class' => 'control-label']) !!}
            </div>
            <div class="form-group">

                {!! Form::button("确定并核算等级", ['id' => 'btn-submit',
                'class' => 'btn btn-primary', 'onclick' => 'onSubmitStandardClick()']) !!}

            </div>
            {!! Form::close() !!}





    <div class="table-responsive">
        <table class="table table-striped">
             <thead>
                  <tr>
                      <th>姓名</th>
                      <th>作业成绩</th>
                      <th>表现成绩</th>
                      <th>总成绩</th>
                      <th>最后等级</th>
                  </tr>
             </thead>
            <tbody></tbody>
        </table>
    </div>




        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">正在读取学生信息</h4>
                    </div>
                    <div class="modal-body">
                        <h1>请等那么一哈哈！</h1>
                    </div>
                </div>
            </div>

@stop

@section('javascript')
    <script src="../js/get-students-info.js"></script>

@stop
