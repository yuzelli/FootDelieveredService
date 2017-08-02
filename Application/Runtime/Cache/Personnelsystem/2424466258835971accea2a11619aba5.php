<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加员工信息</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/Plum/1/Public/Theme1/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/animate.min.css" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/Plum/1/Public/Theme1/static/plupload/upfiless.css" rel="stylesheet" type="text/css" />
    <link href="/Plum/1/Public/Theme1/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
    <link href="/Plum/1/Public/Theme1/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo ($rs_staffShow["stName"]); ?>的离职信息设置 <a style="margin-left: 15px; color:#06cbc4" href="/Plum/1/Personnelsystem/Staff/lists">返回列表</a></h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form form-horizontal" id="form-article-add" action="/Plum/1/Personnelsystem/Staff/QuitAddAction/stId/<?php echo ($rs_staffShow["stId"]); ?>" method="post">
                            <div class="form-group">

                                 <label class="col-sm-1 control-label">员工姓名</label>
                                <div class="col-sm-6">
                                    <input type="text" value="<?php echo ($rs_staffShow["stName"]); ?>"  class="form-control" disabled>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-1 control-label">员工性别</label>

                                <div class="col-sm-6">
                                
                                    <?php if($rs_staffShow["stSex"] == 1): ?><input type="text" value="男"  class="form-control" disabled>
                                    <?php else: ?>
                                    <input type="text" value="女"  class="form-control" disabled><?php endif; ?>
                                </div>
                                    
                            </div> -->

                            <!-- <div class="form-group">
                            <label class="col-sm-1 control-label">所在部门</label>
                                    <div class="col-sm-6">
                                    <input type="text" value="<?php echo ($rs_department["dName"]); ?>"  class="form-control" disabled>
                                    </div>
                            </div> -->


                            <!-- <div class="form-group">
                                <label class="col-sm-1 control-label">员工工龄：</label>
                                <div class="col-sm-6">
                                    <input type="text" value="<?php echo ($nowWorkingYear); ?> 年"  class="form-control" disabled>
                                </div>
                                
                            </div>
 -->
                        

                            <div class="form-group">
                                <label class="col-sm-1 control-label">入职日期</label>
                                <div class="col-sm-6">
                                    <input type="date" value="<?php echo ($rs_staffShow["stEntryDate"]); ?>" class="form-control" disabled>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-1 control-label">离职日期</label>
                                <div class="col-sm-6">
                                    <input type="date" name="stDepartureDate" id="stDepartureDate" value="<?php echo ($nowDate); ?>" class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">离职原因：</label>
                                <div class="col-sm-6">
                                <input type="hidden" name="stBlacklist" value="0" checked >
                                   <input type="text" name="stDepartureSo" id="stDepartureSo" class="form-control">
                                </div>

                            </div>

                            
                        
                                
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">更新</button>
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
<script type="text/javascript" src="/Plum/1/Public/Theme1/lib/webuploader/0.1.5/webuploader.min.js"></script> 

    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
    <script type="text/javascript">
	$(function(){
	$("#form-admin-add").validate({
		rules:{
            stNum:{
                required:true,
                minlength:1,
                maxlength:8
            },
            stName:{
                required:true,
                minlength:2,
                maxlength:16
            },
            stSex:{
                required:true,
            },
            stBirthdate:{
                required:true,
            },
            sCompanyIntroduce:{
                required:true,
            },
            stTel:{
                required:true,
                minlength:7,
                maxlength:11
            },
            stDegrees:{
                required:true,
            },
            stEntryDate:{
                required:true,
            },
            stDid:{
                required:true,
            },
            stPositionalTitles:{
                required:true,
            },
            stDuties:{
                required:true,
            },
            stMultiracial:{
                required:true,
            },
            stNativePlace:{
                required:true,
            },
            stIDCard:{
                //required:true,
                minlength:15,
                maxlength:18
            }
            
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
    
<script type="text/javascript" src="/Plum/1/Public/Theme1/static/plupload/plupload.full.min.js"></script>
<script type="text/javascript">
            var uploader = new plupload.Uploader(
                  {
                    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                    browse_button: 'btn', // 上传按钮
                    url: "/Plum/1/Personnelsystem/Staff/up", //远程上传地址
                    flash_swf_url: '/Plum/1/Public/plupload/Moxie.swf', //flash文件地址
                    silverlight_xap_url: '/Plum/1/Public/plupload/Moxie.xap', //silverlight文件地址
                    filters: {
                        max_file_size: '2mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                        mime_types: [//允许文件上传类型
                            {title: "files", extensions: "jpg,png,gif"}
                        ]
                 },
                multi_selection: true, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        if ($("#ul_pics").children("li").length >7) {
                            alert("您上传的图片太多了！");
                            uploader.destroy();
                        } else {
                            var dd = '';
                            plupload.each(files, function(file) { //遍历文件
                                dd += "<dd id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></dd>";
                            });
                            $("#ul_pics").append(dd);
                            uploader.start();
                        }
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条
                 var percent = file.percent;
                        $("#ul_pics" + file.id).find('.bar').css({"width": percent + "%"});
                        $("#ul_pics" + file.id).find(".percent").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                       var data = eval("(" + info.response + ")");
                        $("#" + file.id).html("<img src='/Plum/1/" + data.pic + "'/>");
                        var old=$("#pPic").val();
                         $("#pPic").val(old + data.pic+'###');
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                    }
                }
            });
            uploader.init();
        </script>  
</body>

</html>