<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改员工信息</title>
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
                        <h5>修改员工信息 <a style="margin-left: 15px; color:#06cbc4" href="/Plum/1/Personnelsystem/Staff/lists">返回列表</a></h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="/Plum/1/Personnelsystem/Staff/UpdateAction/stId/<?php echo ($rs_staffInfo["stId"]); ?>" class="form-horizontal" id="form-admin-add" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label class="col-sm-1 control-label">员工编号</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stNum" id="stNum" value="<?php echo ($rs_staffInfo["stNum"]); ?>" placeholder="请输入整数,员工的编号或序号" class="form-control">
                                </div>
                                 <label class="col-sm-1 control-label">员工姓名</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stName" value="<?php echo ($rs_staffInfo["stName"]); ?>" id="stName" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-1 control-label">员工性别</label>
                                <?php $sex_1=1; $sex_2=2; $checked=""; $checkedss=""; if($rs_staffInfo["stSex"]==$sex_1){ $checked="checked"; }else{ $checkedss="checked"; } ?>
                                <div class="col-sm-3">
                                
                                    <label class="checkbox-inline">
                                        <input type="radio" name="stSex" value="<?php echo ($sex_1); ?>" <?php echo ($checked); ?>> 男</label>
                                    <label class="checkbox-inline">
                                        <input type="radio" value="<?php echo ($sex_2); ?>" name="stSex" <?php echo ($checkedss); ?>> 女</label>
                                </div>

                                <label class="col-sm-1 control-label">出生日期</label>
                                    <div class="col-sm-1">
                                    <select data-placeholder="员工出生日期" name="stBirthdateType" class="chosen-select form-control" required>
                                    <?php if($rs_staffInfo["stBirthdateType"] == 1): ?><option value="1" selected >公历</option>
                                    <option value="2" >农历</option>
                                    <?php else: ?>
                                    <option value="1" >公历</option>
                                    <option value="2" selected >农历</option><?php endif; ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="stBirthdate" id="stBirthdate" value="<?php echo ($rs_staffInfo["stBirthdate"]); ?>" class="form-control">
                                    </div>
                            </div> -->

                            

                            <div class="form-group">
                                <label class="col-sm-1 control-label">员工电话</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stTel" id="stTel" value="<?php echo ($rs_staffInfo["stTel"]); ?>" class="form-control">
                                </div>

                                <!-- <label class="col-sm-1 control-label">员工学历</label>
                                <div class="col-sm-3">
                                <select class="chosen-select form-control" size="1" name="stDegrees" id="stDegrees" required >
                                    <option value="" >请选择学历</option>
                                    <?php if(is_array($xueli)): foreach($xueli as $xuelik=>$valxueli): $xzxueli=""; if($rs_staffInfo["stDegrees"]==$xuelik){ $xzxueli="selected"; } ?>
                            <option value="<?php echo ($xuelik); ?>" <?php echo ($xzxueli); ?>><?php echo ($valxueli); ?></option><?php endforeach; endif; ?> 
                                </select>
                                </div> -->
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-sm-1 control-label">入职日期</label>
                                <div class="col-sm-3">
                                    <input type="date" name="stEntryDate" value="<?php echo ($rs_staffInfo["stEntryDate"]); ?>" id="stEntryDate" class="form-control">
                                </div>

                                <?php if($depId != 0): ?><label class="col-sm-1 control-label">所在部门</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select form-control" size="1" name="stDid" id="stDid" required >
                                            <?php $selected=""; if($rs_staffInfo["stDid"]==$rs_department["dId"]){ $selected="selected"; } ?>
                                            <?php if($rs_department["dPid"] == 0 AND $rs_department["dPsid"] == 0): ?><option  style="color:#f87ca8" value="<?php echo ($rs_department["dId"]); ?>" <?php echo ($selected); ?>><?php echo ($rs_department["dName"]); ?></option>
                                            <?php elseif($rs_department["dPid"] != 0 AND $rs_department["dPsid"] == 0): ?>
                                        <?php $dPid=$rs_department["dPid"]; $department=M("department"); $rsp=$department->where("dId={$dPid}")->find(); ?>
                                        <option style="color:#44a5e4" value="<?php echo ($rs_department["dId"]); ?>" <?php echo ($selected); ?>><?php echo ($rsp["dName"]); ?> -> <?php echo ($rs_department["dName"]); ?></option>
                                        
                                        <?php elseif($rs_department["dPid"] == 0 AND $rs_department["dPsid"] != 0): ?>
                                        <?php $dPsid=$rs_department["dPsid"]; $department=M("department"); $rsps=$department->where("dId={$dPsid}")->find(); $rsPsPid=$rsps["dPid"]; $rsPspe=$department->where("dId={$rsPsPid}")->find(); ?>
                                        <option style="color:#067b14" value="<?php echo ($rs_department["dId"]); ?>" <?php echo ($selected); ?>><?php echo ($rsPspe["dName"]); ?> -> <?php echo ($rsps["dName"]); ?> -> <?php echo ($rs_department["dName"]); ?></option><?php endif; ?>  
                                    </select>
                                    </div>
                            </div>
                            <?php else: ?>

                                <label class="col-sm-1 control-label">所在部门</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select form-control" size="1" name="stDid" id="stDid" required >
                                    <?php if(is_array($rs_department)): foreach($rs_department as $key=>$val_department): $selected=""; if($rs_staffInfo["stDid"]==$val_department["dId"]){ $selected="selected"; } ?>
                                        <?php if($val_department["dPid"] == 0 AND $val_department["dPsid"] == 0): ?><option  style="color:#f87ca8" value="<?php echo ($val_department["dId"]); ?>" <?php echo ($selected); ?>><?php echo ($val_department["dName"]); ?></option>
                                        <?php elseif($val_department["dPid"] != 0 AND $val_department["dPsid"] == 0): ?>
                                    <?php $dPid=$val_department["dPid"]; $department=M("department"); $rsp=$department->where("dId={$dPid}")->find(); ?>
                                    <option style="color:#44a5e4" value="<?php echo ($val_department["dId"]); ?>" <?php echo ($selected); ?>><?php echo ($rsp["dName"]); ?> -> <?php echo ($val_department["dName"]); ?></option>
                                    
                                    <?php elseif($val_department["dPid"] == 0 AND $val_department["dPsid"] != 0): ?>
                                    <?php $dPsid=$val_department["dPsid"]; $department=M("department"); $rsps=$department->where("dId={$dPsid}")->find(); $rsPsPid=$rsps["dPid"]; $rsPspe=$department->where("dId={$rsPsPid}")->find(); ?>
                                    <option style="color:#067b14" value="<?php echo ($val_department["dId"]); ?>" <?php echo ($selected); ?>><?php echo ($rsPspe["dName"]); ?> -> <?php echo ($rsps["dName"]); ?> -> <?php echo ($val_department["dName"]); ?></option><?php endif; endforeach; endif; ?>
                                    
                                </select>
                                </div>
                            </div><?php endif; ?>
 -->

                            <!-- </if> -->

                            <!-- <div class="form-group">
                                <label class="col-sm-1 control-label">职称</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select form-control" size="1" name="stPositionalTitles" id="stPositionalTitles" required >
                                   
                                    <option value="" selected>请选择职称</option>
                                    <?php if(is_array($zhicheng)): foreach($zhicheng as $zhichengk=>$valzhicheng): $xzzhicheng=""; if($rs_staffInfo["stPositionalTitles"]==$zhichengk){ $xzzhicheng="selected"; } ?>
                                    <option value="<?php echo ($zhichengk); ?>" <?php echo ($xzzhicheng); ?>><?php echo ($valzhicheng); ?></option><?php endforeach; endif; ?>  
                                    
                                </select>
                                </div>

                                <label class="col-sm-1 control-label">职务</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select form-control" size="1" name="stDuties" id="stDuties" required >
                                    <option value="" selected>请选择职务</option>
                                    <?php if(is_array($zhiwu)): foreach($zhiwu as $zhiwuk=>$valzhiwu): $xzzhiwu=""; if($rs_staffInfo["stDuties"]==$zhiwuk){ $xzzhiwu="selected"; } ?>
                                    <option value="<?php echo ($zhiwuk); ?>" <?php echo ($xzzhiwu); ?>><?php echo ($valzhiwu); ?></option><?php endforeach; endif; ?>
                                    
                                </select>
                                </div>

                            </div> -->


                            <!-- <div class="form-group">
                                <label class="col-sm-1 control-label">民族</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stMultiracial" id="stMultiracial" value="<?php echo ($rs_staffInfo["stMultiracial"]); ?>"  class="form-control">
                                </div>

                                <label class="col-sm-1 control-label">籍贯</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stNativePlace" id="stNativePlace" value="<?php echo ($rs_staffInfo["stNativePlace"]); ?>"  class="form-control">
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-sm-1 control-label">身份证号码</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stIDCard" value="<?php echo ($rs_staffInfo["stIDCard"]); ?>" id="stIDCard" class="form-control">
                                </div>

                                <label class="col-sm-1 control-label">所在地</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stCity" id="stCity" value="<?php echo ($rs_staffInfo["stCity"]); ?>"  class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">身高（CM）</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stHeight" value="<?php echo ($rs_staffInfo["stHeight"]); ?>" id="stHeight" class="form-control">
                                </div>

                                <label class="col-sm-1 control-label">体重（Kg）</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stWeight" value="<?php echo ($rs_staffInfo["stWeight"]); ?>" id="stWeight" class="form-control">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">政治面貌</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stPoliticalIandscape" id="stPoliticalIandscape" value="<?php echo ($rs_staffInfo["stPoliticalIandscape"]); ?>" class="form-control">
                                </div>

                                <label class="col-sm-1 control-label">员工QQ</label>
                                <div class="col-sm-3">
                                    <input type="text" name="stQQ" id="stQQ" value="<?php echo ($rs_staffInfo["stQQ"]); ?>" class="form-control">
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-sm-1 control-label">员工邮箱</label>
                                <div class="col-sm-7">
                                    <input type="text" name="stEmail" id="stEmail" value="<?php echo ($rs_staffInfo["stEmail"]); ?>" class="form-control">
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-1 control-label">掌握技能</label>
                                <div class="col-sm-3">
                                    <textarea class="input-text form-control" id="stJineng" name="stJineng" rows="3" ><?php echo ($rs_staffInfo["stJineng"]); ?></textarea>
                                </div>
                                <label class="col-sm-1 control-label">工作经验</label>
                                <div class="col-sm-3">
                                    <textarea class="input-text form-control" id="stJingyuan" name="stJingyuan" rows="3" placeholder=""><?php echo ($rs_staffInfo["stJingyuan"]); ?></textarea>
                                </div>
                            </div> -->
                            
                                <!-- <?php $stPhoto=strlen($rs_staffInfo["stPhoto"]); ?>
                            <div class="form-group">
                                <label class="col-sm-1 control-label" style="margin-top: 20px;">照片</label>
                                <div class="col-sm-7">
                                    <dl id="ul_pics" class="ul_pics clearfix" >
                                       <?php if($stPhoto < 10): ?><img src="/Plum/1/Public/Theme1/img/not.png" width="100" height="100" style=" margin-bottom:5px;">
                                     <?php else: ?>
                                     <img src="/Plum/1/<?php echo ($rs_staffInfo["stPhoto"]); ?>" width="100" height="100" style=" margin-bottom:5px;"><?php endif; ?>


                                    </dl>
                                    <a class="upimgs col-sm-2" id="btn" style="background-color:#067fcb; width:100px; margin-top: 2px;">浏览照片</a>
                                    <?php if($stPhoto > 5): ?><input class="form-control upload-url" name="stPhoto" value="<?php echo ($rs_staffInfo["stPhoto"]); ?>" id="pPic" style="width:88%; margin-left:5px; margin-right:5px;">
                                     <?php else: ?>
                                    <input class="upload-url form-control" name="stPhoto" value="" id="pPic" style="width:88%; margin-left:5px; margin-right:5px;"><?php endif; ?>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">附件</label>
                                <div class="col-sm-7">
                                <input type="hidden" name="stEnclosure" value="<?php echo ($rs_staffInfo["stEnclosure"]); ?>" id="stEnclosure" class="form-control">
                                    <input type="file" name="stEnclosure" value="<?php echo ($rs_staffInfo["stEnclosure"]); ?>" id="stEnclosure" class="form-control">
                                </div>

                            </div> -->
                        
                                
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">修改员工信息</button>
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