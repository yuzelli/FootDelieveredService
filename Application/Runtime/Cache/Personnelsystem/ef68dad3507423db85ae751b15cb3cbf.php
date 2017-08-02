<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加三级级部门</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Plum/1/Public/Theme1/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/animate.min.css" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><a style="color:#06cbc4;">修改订单</a>
                            <a href="/Plum/1/Personnelsystem/Department/listsedit/status/0" style="margin-left:15px;color: black;">新增订单</a>
                            <a href="/Plum/1/Personnelsystem/Department/listsedit/status/1" style="margin-left:15px;color: black;">已接订单</a>
                            <a href="/Plum/1/Personnelsystem/Department/listsedit/status/2" style="margin-left:15px;color: black;">完成订单</a>
                        </h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/Plum/1/Personnelsystem/Department/UpdateAction/order_id/<?php echo ($rs_order["order_id"]); ?>" class="form-horizontal" id="form-admin-add" >
                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">客户姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" name="usename" id="dName" placeholder="" value="<?php echo ($rs_order["username"]); ?>" class="form-control">
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">客户电话</label>
                                <div class="col-sm-10">
                                    <input type="text" name="mobile" id="dDirector" value="<?php echo ($rs_order["mobile"]); ?>"  placeholder="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">配送时限</label>
                                <div class="col-sm-10">
                                    <input type="text" name="outtime" id="dDirector" value="<?php echo ($rs_order["outtime"]); ?>"  placeholder="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">订单照片</label>
                                <div class="col-sm-3">
                                <img src="<?php echo ($rs_order["img_url"]); ?>" width="100" height="100">
                                   <input style="margin-top: 8px;" type="file" name="img_url" class="form-control" >
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">客户住址</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" name="address" value="<?php echo ($rs_order["address"]); ?>" id="dDirectorTel" placeholder="" class="form-control">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">商品数量</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" name="goods_amount" value="<?php echo ($rs_order["goods_amount"]); ?>"  id="dDirectorQQ" placeholder="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">商品金额</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" name="money_paid" value="<?php echo ($rs_order["money_paid"]); ?>"  id="money_paid" placeholder="" class="form-control">
                                </div>
                            </div> -->
                                
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">修改订单</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/Plum/1/Public/Theme1/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Plum/1/Public/Theme1/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Plum/1/Public/Theme1/js/content.min.js?v=1.0.0"></script>
    <script src="/Plum/1/Public/Theme1/js/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="/Plum/1/Public/Theme1/check/js/jquery.validate.min.js"></script> 

<script type="text/javascript" src="/Plum/1/Public/Theme1/check/js/messages_zh.min.js"></script> 

<script type="text/javascript" src="/Plum/1/Public/Theme1/check/js/validate-methods.js"></script> 

    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
    <script type="text/javascript">
	$(function(){
	$("#form-admin-add").validate({
		rules:{
			dName:{
                required:true,
                minlength:2,
                maxlength:20
            },
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
    
    
</body>

</html>