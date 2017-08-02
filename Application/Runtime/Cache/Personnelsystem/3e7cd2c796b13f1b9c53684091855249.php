<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加三级级部门</title>
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
                        <h5><a style="color:#06cbc4;">订单详情</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/0" style="margin-left:15px;color: black;">新增订单</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/1" style="margin-left:15px;color: black;">已接订单</a>
                            <a href="/mssd/1/Personnelsystem/Department/listsedit/status/2" style="margin-left:15px;color: black;">完成订单</a></h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/mssd/1/Personnelsystem/Department/UpdateAction/order_id/<?php echo ($rs_order["order_id"]); ?>" class="form-horizontal" id="form-admin-add">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">客户电话:</label>
                                <div class="col-sm-2">
                                    <span class="form-control"><?php echo ($rs_order["mobile"]); ?></span>
                                </div>
                                <label class="col-sm-2 control-label">配送时限:</label>
                                <div class="col-sm-2">
                                    <span class="form-control"><?php echo ($rs_order["outtime"]); ?></span>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">客户住址:</label>
                                <div class="col-sm-6">
                                    <span class="form-control"><?php echo ($rs_order["address"]); ?></span>
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">商品数量:</label>
                                <div class="col-sm-2">
                                    <span class="form-control"><?php echo ($rs_order["goods_amount"]); ?></span>
                                </div>
                                <label class="col-sm-2 control-label">商品金额:</label>
                                <div class="col-sm-2">
                                   <span class="form-control"><?php echo ($rs_order["money_paid"]); ?></span>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">订单状态:</label>
                                <div class="col-sm-6">
                                    <span class="form-control"><?php echo ($rs_order["order_status_name"]); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">配送状态:</label>
                                <div class="col-sm-2">
                                    <span class="form-control send_status" ></span>
                                </div>

                                <label class="col-sm-2 control-label">距离超时:</label>
                                <div class="col-sm-2">
                                    <span class="form-control end_time"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">下单时间:</label>
                                <div class="col-sm-6">
                                    <span class="form-control"><?php echo ($rs_order["add_time"]); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">接单时间:</label>
                                <div class="col-sm-6">
                                   <span class="form-control"><?php echo ($rs_order["confirm_time"]); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">完成时间:</label>
                                <div class="col-sm-6">
                                   <span class="form-control"><?php echo ($rs_order["finished_time"]); ?></span>
                                </div>
                            </div>

                

                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">订单图片</label>
                                <div class="col-sm-5">
                                    <img src="<?php echo ($rs_order["img_url"]); ?>" width="100" height="100">
                                </div>
                            </div> -->
                                
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a style="margin-left: 15px;" href="/mssd/1/Personnelsystem/Department/RemindOrder/order_id/<?php echo ($rs_order["order_id"]); ?>">催单
                                        </a>
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

<script type="text/javascript" src="/mssd/1/Public/Theme1/check/js/messages_zh.min.js"></script> 

<script type="text/javascript" src="/mssd/1/Public/Theme1/check/js/validate-methods.js"></script> 

    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
<script type="text/javascript">
var end_time   = "<?php echo ($rs_order["end_time"]); ?>";
var status     = "<?php echo ($rs_order["order_status"]); ?>";
var is_outtime = "<?php echo ($is_outtime); ?>";
(function () {
    if (status <= 1) {
        if (is_outtime == 1) {
            // console.log(end_time);return;
            $(".send_status").text("未超时");
        }else{
            $(".send_status").text("已超时");
            $(".end_time").text("0秒");
        }
    }
    var g_timer = 0;

    function getTimeCountdown(timeString) {
        var arr = timeString.split(" ");
        var t1 = arr[0].split("-");
        var t2 = arr[1].split(":");
        var timediff = new Date(parseInt(t1[0]), parseInt(t1[1]) - 1, parseInt(t1[2]), parseInt(t2[0]), parseInt(t2[1]), parseInt(t2[2]));
        var now = new Date();

        var time = timediff.getTime() - now.getTime();
        if (time <= 1000) {
            clearInterval(g_timer);
            setTimeout(function () {
                location.reload(true);
            }, 1000);
            return "0秒";
        }

        time = parseInt(parseInt(time) / 1000);
        var day1 = Math.floor(time / (60 * 60 * 24));
        var hour = Math.floor((time - day1 * 24 * 60 * 60) / 3600);
        var minute = Math.floor((time - day1 * 24 * 60 * 60 - hour * 3600) / 60);
        var second = Math.floor(time - day1 * 24 * 60 * 60 - hour * 3600 - minute * 60);
        if (day1 > 0) {
            return day1 + "天" + hour + "小时" + minute + "分" + second + "秒";
        } else if (hour > 0) {
            return hour + "小时" + minute + "分" + second + "秒";
        } else if (minute > 0) {
            return minute + "分" + second + "秒";
        } else {
            return second + "秒";
        }
    }

    window.init_act_time = function () {
        if (status <= 1) {
            if (is_outtime == 2) return;
            if (end_time == "") return;
            el = $(".end_time");
            time = end_time + "";
            if (el.length == 0) return;
            var time_tip = getTimeCountdown(time);
            el.text(time_tip);

            g_timer = setInterval(function () {
                el.text(getTimeCountdown(time));
            }, 1000);
        }
    }
    init_act_time();
}());
</script> 
    
    
</body>

</html>