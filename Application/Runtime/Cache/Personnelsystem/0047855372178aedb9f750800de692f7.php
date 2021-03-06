<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>订单列表</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/mssd/1/Public/Theme1/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/mssd/1/Public/Theme1/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/mssd/1/Public/Theme1/css/animate.min.css" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            <a href="/mssd/1/Personnelsystem/Department/add" style="color: black;">添加订单</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/0" style="margin-left:15px;"><?php if($status == 0 ): ?><span style="color:#06cbc4;">新增订单</span><?php else: ?><span style="color:black;">新增订单</span><?php endif; ?></a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/1 " style="margin-left:15px;"><?php if($status == 1 ): ?><span style="color:#06cbc4;">已接订单</span><?php else: ?><span style="color:black;">已接订单</span><?php endif; ?></a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/2" style="margin-left:15px;"><?php if($status == 2 ): ?><span style="color:#06cbc4;">完成订单</span><?php else: ?><span style="color:black;">完成订单</span><?php endif; ?></a>
                        </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                        <!-- <div style="position: relative;margin-left: 30px;">xinzen</div> -->
                            <thead>
                                <tr>
                                    <th>订单ID</th>
                                    <th>订单编号</th>
                                    <th>订单状态</th>
                                    <th  class="dropdown hidden-xs">客户电话</th>
                                    <th  class="dropdown hidden-xs">配送时限</th>
                                    <th  class="dropdown hidden-xs">配送员姓名</th>
                                    <th  class="dropdown hidden-xs">配送员电话</th>
                                    <th  class="dropdown hidden-xs">下单时间</th>
                                    <th  class="dropdown hidden-xs">接单时间</th>
                                    <th  class="dropdown hidden-xs">完成时间</th>
                                    <!-- <th  class="dropdown hidden-xs">订单图片</th> -->
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($rs_order)): foreach($rs_order as $key=>$val_order): ?><tr>
                                    <td><?php echo ($val_order["order_id"]); ?></td>
                                    <td><?php echo ($val_order["order_sn"]); ?></td>
                                    <td><?php echo ($val_order["order_status_name"]); ?></td>
                                    
                                    
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["mobile"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["outtime"]); ?>min</td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["stName"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["stTel"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["add_time"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["confirm_time"]); ?></td>
                                    <td class="dropdown hidden-xs"><?php echo ($val_order["finished_time"]); ?></td>
                                    <!-- <td class="dropdown hidden-xs"><img src="<?php echo ($val_order["img_url"]); ?>" width="100" height="100"></td> -->
                                    
                                    <td width="60">
                                        <a href="/mssd/1/Personnelsystem/Department/listseditupdate/order_id/<?php echo ($val_order["order_id"]); ?>/status/<?php echo ($val_order["status"]); ?>">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a> 
                                        <a style="margin-left: 10px;" href="/mssd/1/Personnelsystem/Department/DelAction/order_id/<?php echo ($val_order["order_id"]); ?>">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </a><br>

                                        <?php if($status == 0 OR $status == 1): if($status == 0): ?><a   class="send_order_btn" order_id="<?php echo ($val_order["order_id"]); ?>" >发单
                                        </a><?php endif; ?>

                                        <?php if($status == 1): ?><a  href="/mssd/1/Personnelsystem/Department/RemindOrder/order_id/<?php echo ($val_order["order_id"]); ?>" style="margin-left: 2px;">催单
                                        </a><?php endif; endif; ?>
                                        <a  href="/mssd/1/Personnelsystem/Department/orderdetail/order_id/<?php echo ($val_order["order_id"]); ?>">详情
                                        </a>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        发单中心
                    </h4>
                </div>
                <form method="post" action="/mssd/1/Personnelsystem/Department/SendOrder" class="form-horizontal" id="form1" enctype="multipart/form-data">
                    <input type="hidden" name="order_id" class="order_id" value="">
                    <div class="modal-body">
                        <div style="margin-bottom: 14px;">
                            <label class="col-sm-2 control-label">职务</label>
                            <div class="col-sm-6" >
                                <select class="chosen-select form-control" size="1" name="stId" id="stDuties" required >
                                <option value="" selected>请选择配送员</option>
                                <?php if(is_array($rs_staff)): foreach($rs_staff as $staff_id=>$staff): ?><option value="<?php echo ($staff["stId"]); ?>" ><?php echo ($staff["stName"]); ?></option><?php endforeach; endif; ?>
                                
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            确认发单
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <script src="/mssd/1/Public/Theme1/js/jquery.min.js?v=2.1.4"></script>
    <script src="/mssd/1/Public/Theme1/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/mssd/1/Public/Theme1/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/mssd/1/Public/Theme1/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/mssd/1/Public/Theme1/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/mssd/1/Public/Theme1/js/content.min.js?v=1.0.0"></script>
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var
         oTable=$("#editable").dataTable();oTable.$("td").editable("../example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>
    <script>
        $(".send_order_btn").click(function(){
            $(".order_id").val($(this).attr("order_id"));
            $(this).attr("data-toggle","modal");
            $(this).attr("data-target","#myModal");
        });
    </script>
</body>

</html>