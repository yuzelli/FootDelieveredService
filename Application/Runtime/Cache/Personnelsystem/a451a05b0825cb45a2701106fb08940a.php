<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <title><?php echo ($rs_systemName["sname"]); ?>-登陆中心</title>

    <link href="/mssd/1/Public/Theme1/login/css/style.css" rel="stylesheet">
    <link href="/mssd/1/Public/Theme1/login/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="/mssd/1/Personnelsystem/Login/CheckLogin/" method="post">
        <div class="form-signin-heading text-center">
        <!--
            <h1 class="sign-title" style="font-weight: bold; color: #03a40e"><?php echo ($rs_systemName["sName"]); ?></h1>
        -->
            <img src="/mssd/1/Public/Theme1/img/default_3.png" width="100" height="100" >
            <div style="color: black;font-size: 1.3em;">管理系统</div>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" name="aUser" placeholder="用户名" required>
            <input type="password" class="form-control" name="aPwd" placeholder="密码" required>
            <?php if($rs_systemName["sCheckCodeSwitch"] == 1): ?><input type="text" class="form-control" name="code" placeholder="验证码" required style="width:48%;float:left; margin-top: 0px; margin-right: 4%" required>
                <img  alt="点击更换" title="点击更换" src="/mssd/1/Verify/Verify/" onclick="this.src='/mssd/1/Verify/Verify/random/'+Math.random();" width="100px"><?php endif; ?>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check">登陆</i>
            </button>

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/mssd/1/Public/Theme1/login/js/jquery-1.10.2.min.js"></script>
<script src="/mssd/1/Public/Theme1/login/js/bootstrap.min.js"></script>
<script src="/mssd/1/Public/Theme1/login/js/modernizr.min.js"></script>

</body>
</html>