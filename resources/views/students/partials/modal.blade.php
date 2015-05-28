<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="waitModal" tabindex="-1" role="dialog"
     aria-labelledby="waitModalLabel" aria-hidden="true">
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
</div>

<div class="modal fade bs-example-modal-lg" id="formUnvalidModal" tabindex="-1" role="dialog"
     aria-labelledby="formUnvalidModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">出错了！</h4>
            </div>
            <div class="modal-body">
                <h1>你有些信息没有填哦！已经用红色标出。</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">晓得了，马上填起！</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="confirmSyncStudentsDataModal" tabindex="-1" role="dialog"
     aria-labelledby="confirmSyncStudentsDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you 确定？</h4>
            </div>
            <div class="modal-body">
                <h2>确定要清除当前所有学生数据，并从学科网重新同步？</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-danger" onclick="syncStudentsData()">确定</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade bs-example-modal-lg" id="syncStudentsDataFinishModal" tabindex="-1" role="dialog"
     aria-labelledby="syncStudentsDataFinishModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">操作完成</h4>
            </div>
            <div class="modal-body">
                <h2>学生数据同步完成！</h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->