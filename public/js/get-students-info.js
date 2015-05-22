/**
 * Created by zc on 15-5-22.
 */
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
        },
        success:function(data){

            data.forEach(function(student){
                $("tbody").append("\<tr\>" +
                "\<td\>" + student.Sname + "\</td\>" +
                "\<td\>" + student.Sscore + "\</td\>" +
                "\<td\>" + student.Sattitude + "\</td\>" +
                "\</tr\>");
                console.log(student.Sname);
            });
            $('#myModal').modal('hide');

        }
    });
}

function onSubmitStandardClick(){
    var standardArray = {"standard-A-up": $("#txt-standard-A-up").val(),
        "standard-B-up": $("#txt-standard-B-up").val(),
        "standard-B-down": $("#txt-standard-B-down").val(),
        "standard-C-up": $("#txt-standard-C-up").val(),
        "standard-C-down": $("#txt-standard-C-down").val(),
        "standard-D-down": $("#txt-standard-D-down").val()};
    console.log(standardArray);

    $.ajax(
        type: 'POST',
        'url': "/scoretograde",
        standardArray,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success:function(data){
            console.log(data);
        }
    );
}