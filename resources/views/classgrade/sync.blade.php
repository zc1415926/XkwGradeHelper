@extends('layouts.default')

@section('doc-header')
    <div class="bs-docs-header" id="content" tabindex="-1">
        <div class="container">

            <h1>组件</h1>
            <p>无数可复用的组件，包括字体图标、下拉菜单、导航、警告框、弹出框等更多功能。</p>
            <br>
            <a href={{ URL::route('classgrade.sync') }} class="btn btn-outline-inverse btn-lg">从学科网同步年级班级数据</a>

        </div>

    </div>
@stop
@section('content')

    <div class="row">
        <div class="col-md-6" role="main">
            <div class="table-responsive">
            <table class="table table-striped table-responsive">
                <thead><tr><th>本地数据</th></tr></thead>
                <tbody>
                    @foreach($localClassGrades as $localCG)
                        <tr><td>{{ $localCG->grade . "年级" . $localCG->class . "班" }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        <div class="col-ma-4">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead><tr><th>学科网数据</th></tr></thead>
                <tbody>
                    @foreach($xlwClassGrades as $xlwCG)

                        <tr><td>{{ $xlwCG->Sgrade . "年级" . $xlwCG->Sclass . "班" }}</td></tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>

    </div>



@stop