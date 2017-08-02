<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加订单</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/mssd/1/Public/Theme1/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/css/animate.min.css" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/css/style.min.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><a style="color:#06cbc4;">添加订单</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/0" style="margin-left:15px;color: black;">新增订单</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/1" style="margin-left:15px;color: black;">已接订单</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/2" style="margin-left:15px;color: black;">完成订单</a>
                        </h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/mssd/1/Personnelsystem/Department/AddAction" class="form-horizontal" id="form-admin-add" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">订单编号</label>
                                <div class="col-sm-3">
                                    <input type="text" name="order_sn" id="dName" placeholder=""  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">平台名称</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select form-control" size="1" name="order_type" id="stDuties" required >
                                        <option value="">请选平台</option>
                                        <option value="1" >美团</option>
                                        <option value="2" >饿了吗</option>
                                        <option value="3" >百度外卖</option>
                                        <option value="4" >口碑</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">客户电话</label>
                                <div class="col-sm-3">
                                    <input type="text" name="mobile" id="dName" placeholder=""  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">送餐时限</label>
                                <div class="col-sm-3">
                                    <input type="text" name="outtime" id="dDirector" placeholder="" value="" class="form-control"><span style="color: red;">*意为送餐员接单后多少分钟内送达</span>
                                </div>
                            </div>

                           <!--  <div class="form-group">
                                <label class="col-sm-2 control-label">客户住址</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" name="address" id="dDirectorTel" placeholder="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">商品数量</label>
                                <div class="col-sm-10">
                                    
                                    <input type="text" name="goods_amount" id="dDirectorQQ" placeholder="" class="form-control">
                                </div>
                            </div> -->
                                

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">订单金额</label>
                                <div class="col-sm-10">
                                    <input type="email" name="money_paid" id="dDirectorEmail" placeholder="" class="form-control">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">订单金额</label>
                                <div class="col-sm-10">
                                   <input type="text" name="money_paid" id="" placeholder="" class="form-control">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">订单照片</label>
                                <div class="col-sm-3">
                                   <input style="margin-top: 8px;" type="file" name="img_url" class="form-control" >
                                </div>
                            </div> -->
                                
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">添加订单</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/mssd/1/Public/Theme1/js/jquery.min.js?v=2.1.4"></script>
    <script src="/mssd/1/Public/Theme1/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/mssd/1/Public/Theme1/js/content.min.js?v=1.0.0"></script>
    <script src="/mssd/1/Public/Theme1/js/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="/mssd/1/Public/Theme1/check/js/jquery.validate.min.js"></script> 

<!-- <script type="text/javascript" src="/mssd/1/Public/Theme1/check/js/messages_zh.min.js"></script>  -->

<!-- <script type="text/javascript" src="/mssd/1/Public/Theme1/check/js/validate-methods.js"></script>  -->

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