<meta name="_token" content="{{csrf_token()}}" />
@extends('layouts.default')

@section('content')

    {!! Form::open() !!}
        {!! Form::label('lblSelectGrade', '年级：') !!}
        {!! Form::select('selSelectGrade', $grades, null, ['onclick'=>'getClassesFromGrade()',
                                                           'class' => 'selSelectGrade']) !!}

        {!! Form::label('lblSelectClass', '班级：') !!}
        {!! Form::select('selSelectClass', array(), null, ['class' => 'selSelectClass']) !!}
    {!! Form::close() !!}




@stop

@section('javascript')
    <script type="text/javascript">
        //$(selSelectGrade.selSelectGrade)


        function getClassesFromGrade(){
            //window.location.href="/classgrade/classes/" + $("select.selSelectGrade").find("option:selected").text();
            $.ajax({

                type:"post",
                url: "/classgrade/classes/" + $("select.selSelectGrade").find("option:selected").text(),

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },


                beforeSend:function(data){
                    $("select.selSelectClass").empty();
                    $("select.selSelectClass").append("\<option\>等一下\</option\>");
                    $("select.selSelectClass").attr("disabled","disabled");
                },
                success:function(data){
                    $("select.selSelectClass").empty();
                    $("select.selSelectClass").removeAttr("disabled");
                    data.forEach(function(classFromGrade){
                        $("select.selSelectClass").append("\<option\>" + classFromGrade + "\</option\>");
                        console.log("\<option\>" + classFromGrade + "\</option\>");
                        console.log(classFromGrade);
                    });

                    console.log("success");

                },
                error:function(data){
                    $("select.selSelectClass").empty();
                    console.log("error");
                    console.log(data);
                }
            });

        }
    </script>
@stop
