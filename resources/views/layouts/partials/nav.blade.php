<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../" class="navbar-brand">学科网成绩统计系统</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('students.index') }}">查看学生数据</a>
                </li>
                <li>
                    <a href="{{ route('students.sync') }}">同步学生数据</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://www.rhjxx.com/"  target="_blank">人和街小学</a></li>
            </ul>
        </nav>
    </div>
</header>