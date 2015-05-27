/**
 * Created by zc on 15-5-22.
 */
//$('#standard-form').hide();
var validatorgrade;
$(document).ready(function(){
    $.validator.messages.required = "";
    $.validator.messages.number = "";
    validatorgrade = $("#grade-class-form").validate({
        rules: {
            'selSelectGrade':{
                "gradeclass":true
            },
            'selSelectClass':{
                "gradeclass":true
            }
        }
    });

  $("#standard-form").validate({
        rules: {
            'txt-standard-A-up':{
                required: true,
                number: true
            },
            'txt-standard-B-up':{
                required: true,
                number: true
            },
            'txt-standard-B-down':{
                required: true,
                number: true
            },
            'txt-standard-C-up':{
                required: true,
                number: true
            },
            'txt-standard-C-down':{
                required: true,
                number: true
            },

            'txt-standard-D-down':{
                required: true,
                number: true
            }


        }
    });

      $.validator.addMethod('gradeclass', function(value, element, params){

        return $(element).find("option:selected").index() > 0;
    }, '');
     /* $("#grade-class-form").validate({
        'selSelectGrade':{
            //required: true,
            number: true
        },
        'selSelectClasss':{
            //required: true,
            number: true
        }
    });*/
});

function getClassesFromGrade(){
    $.ajax({
        type:"post",
        url: "/classgrade/classes/" + $("select.selSelectGrade").find("option:selected").text(),

        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },

        beforeSend:function(data){
            //读取班级数据之前，清除select原有班级数据，替换为“等一下”，并设为不可用状态
            $("select.selSelectClass").empty();
            $("select.selSelectClass").append("\<option\>等一下\</option\>");
            $("select.selSelectClass").attr("disabled","disabled");

            //年级或班级变更后，清除原来表格中的学生信息
            $("tbody").empty();
            //还要清除原来的评分标准
            cleanStandardForm();
        },
        success:function(data){
            //数据读取成功
            $("select.selSelectClass").empty();
            $("select.selSelectClass").removeAttr("disabled");
            data.forEach(function(classFromGrade){
                $("select.selSelectClass").append("\<option\>" + classFromGrade + "\</option\>");
                //console.log("\<option\>" + classFromGrade + "\</option\>");
                //console.log(classFromGrade);
            });
        },
        error:function(data){
            $("select.selSelectClass").empty();
            console.log("error");
            console.log(data);
        }
    });
}

function getStudentsFromClass(){
    $.ajax({
        type: "post",
        url: "/students/" +
        $("select.selSelectGrade").find("option:selected").text() +
        "/" +
        $("select.selSelectClass").find("option:selected").text(),

        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },

        beforeSend:function(data){
            //年级或班级变更后，清除原来表格中的学生信息
            $("tbody").empty();
            $('#myModal').modal({backdrop: 'static', keyboard: false});
            //还要清除原来的评分标准
            cleanStandardForm();
        },
        success:function(data){
            data.forEach(function(student){
                $("tbody").append("\<tr\>" +
                "\<td class='name'\>" + student.name + "\</td\>" +
                "\<td class='score'\>" + student.score + "\</td\>" +
                "\<td class='attitude'\>" + student.attitude + "\</td\>" +
                "\<td class='attitude'\>" + student.sum + "\</td\>" +
                "\<td class='scoretograde'\>" + student.score_to_grade + "\</td\>" +
                "\</tr\>");
                //console.log(student.Sname);
            });
            $('#myModal').modal('hide');

            //切换班级后，如果这个班已经制订过评分标准，那么就读取出来
            //显示在评分标准的Form里
            getStandardByGradeClass();
        }
    });
}

function onSubmitStandardClick(){

    if($('#grade-class-form').valid() && $('#standard-form').valid()){
        alert('yes!');
    }else{

        alert('oh');
    }


   /* var standardArray = {
        "_token": $('form#standard-form input[name="_token"]').val(),
        "grade": $("select.selSelectGrade").find("option:selected").text(),
        "class": $("select.selSelectClass").find("option:selected").text(),
        "standard-A-up": $("#txt-standard-A-up").val(),
        "standard-B-up": $("#txt-standard-B-up").val(),
        "standard-B-down": $("#txt-standard-B-down").val(),
        "standard-C-up": $("#txt-standard-C-up").val(),
        "standard-C-down": $("#txt-standard-C-down").val(),
        "standard-D-down": $("#txt-standard-D-down").val()};
    console.log(standardArray);

    $.post(
        "/scoretograde",
        standardArray,
        function(data){
            console.log('standard');
            console.log(data);
            //refreshStudentsTable();
            getStudentsFromClass();

        },
        'json'
    );
*/
    return false;
}

function refreshStudentsTable(){

}


function cleanStandardForm(){

        //$("select.selSelectGrade").find("option:selected").text(),
        //$("select.selSelectClass").find("option:selected").text(),
        $("#txt-standard-A-up").val("");
        $("#txt-standard-B-up").val("");
        $("#txt-standard-B-down").val("");
        $("#txt-standard-C-up").val("");
        $("#txt-standard-C-down").val("");
        $("#txt-standard-D-down").val("");
}

function getStandardByGradeClass(){
    $.ajax({
        type: "post",
        url: "/standard/" +
        $("select.selSelectGrade").find("option:selected").text() +
        "/" +
        $("select.selSelectClass").find("option:selected").text(),

        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },

        success:function(data){

            if(data == ""){
                console.log("no standard");
            }else{
                console.log("get standard!");
                //console.log(data[0]);

                $("#txt-standard-A-up").val(data[0]['standard-A-up']);
                $("#txt-standard-B-up").val(data[0]['standard-B-up']);
                $("#txt-standard-B-down").val(data[0]['standard-B-down']);
                $("#txt-standard-C-up").val(data[0]['standard-C-up']);
                $("#txt-standard-C-down").val(data[0]['standard-C-down']);
                $("#txt-standard-D-down").val(data[0]['standard-D-down']);
            }


        }
    });
}

