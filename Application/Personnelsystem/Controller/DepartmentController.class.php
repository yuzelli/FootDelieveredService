<?php
namespace Personnelsystem\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class DepartmentController extends LoginTrueController {
    public function Add(){
        $this->LoginTrue();
        $systemName=M("system");
        $rs_systemName=$systemName->field("sDepartment")->where("sId=1")->find();
        $this->assign("rs_systemName",$rs_systemName);
        $this->display();
    }

    //添加订单
    public function AddAction(){
        $this->LoginTrue();
        $data = $_POST;
        $data['order_sn']          = $_POST['order_sn']?$_POST['order_sn']:self::generate_order_sn();
        $data['add_time']          = date("Y-m-d H:i:s",time());
        $data['order_status_name'] = "未接单";

        $img_url=$_FILES["img_url"];
        if(strlen($img_url["name"])>0){

            $config = array(  
                'maxSize' => 3145728,  
                'exts'=>array('jpg', 'gif', 'png', 'jpeg'),  
                 'rootPath'=>'/public/Uploads/', //文件在本地调试时上传的目录，其实也等同于public的domain下的Uploads文件夹  
                'autoSub'=>false    
             );  
            $upload = new \Think\Upload($config,'sae');// 实例化上传类
            // $upload->maxSize   =     3145728 ;// 设置附件上传大小
            // $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
            // $upload->savePath  =     'uploads/Order/'; // 设置附件上传（子）目录
            $upload->subName=array('date','Ymd');

            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }

            foreach($info as $file){
                $imgsUrl= $file['url'];
            }
            $data["img_url"]=$imgsUrl;
        }
        $order = M('order_info');
        $result=$order->add($data);
        if($result){
            header("location:".U('Department/add'));
            // $this->success("添加成功",'',0);
        }else{
            header("location:".U('Department/add'));
        }
    }

 
    
    public function ListsEdit(){
        $this->LoginTrue();
        $status   = $_GET['status'];
        
        $staff    = M('staff');
        if ($status != 0) {
            $rs_order = M()->table('saya_order_info  as  oi')->join('saya_staff  as  s  on  oi.stId = s.stId')->where("oi.del_flag<>1 AND oi.order_status=".$status)->select();
        }else{
            $rs_order = M('order_info')->where("del_flag<>1 AND order_status=".$status)->select();
        }
        
        $rs_staff = $staff->where("stJobState = 1")->select();
        $this->assign("status",$status);
        $this->assign("rs_order",$rs_order);
        $this->assign("rs_staff",$rs_staff);
        $this->display();
    }
    public function ListsEditUpdate(){
        $this->LoginTrue();
        $order_id = $_GET["order_id"];
        $order    = M("order_info");
        $rs_order = $order->where("order_id={$order_id}")->find();
        $this->assign("rs_order",$rs_order);
        $this->display();
    }
    public function Update(){
        $this->LoginTrue();
        $dId=$_GET["dId"];
        $department=M("department");
        $rs_department=$department->where("dId={$dId}")->find();
        $this->assign("rs_department",$rs_department);
        $this->display();
    }
    public function UpdateAction(){
        $this->LoginTrue();
        $order_id = $_GET["order_id"];
        $status   = $_GET['status'];
        $up_order = $_POST;

        $img_url=$_FILES["img_url"];
        if(strlen($img_url["name"])>0){

            $config = array(  
                'maxSize' => 3145728,  
                'exts'=>array('jpg', 'gif', 'png', 'jpeg'),  
                 'rootPath'=>'/public/Uploads/', //文件在本地调试时上传的目录，其实也等同于public的domain下的Uploads文件夹  
                'autoSub'=>false    
             );  
            $upload = new \Think\Upload($config,'sae');// 实例化上传类
            // $upload->maxSize   =     3145728 ;// 设置附件上传大小
            // $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $rootPath= $upload->rootPath  =     './'; // 设置附件上传根目录
            // $upload->savePath  =     'uploads/Order/'; // 设置附件上传（子）目录
            $upload->subName=array('date','Ymd');

            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }

            foreach($info as $file){
                $imgsUrl= $file['url'];
            }
            $up_order["img_url"]=$imgsUrl;
        }
        $order    = M("order_info");
        $result   = $order->where("order_id={$order_id}")->save($up_order);
        if($result){
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }

    //删除订单
    public function DelAction(){
        $this->LoginTrue();
        $order_id = $_GET["order_id"];
        $order    = M("order_info");
        $up_order = array('del_flag' => 1);
        $result   = $order->where("order_id={$order_id}")->save($up_order);
        if($result){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    //生成订单号
    public function generate_order_sn()
    {
        $prf = 'P';
        $order_sn = $prf . strtoupper(dechex(date('m'))) . date('d');
        $order_sn .= substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%d', rand(0, 99));
        return $order_sn;
    }


    //发单
    public function SendOrder(){
        $order    = M('order_info');
        $staff    = M('staff');
        $data     = $_POST;
        $order_id = $data['order_id'];
        $rs_staff = $staff->field("stTel")->where("stId=".$data['stId'])->find();

        
        $va_order = array(
            'stId'              => $data['stId'],
            'confirm_time'      => date("Y-m-d H:i:s",time()),
            'order_status'      => 1,
            'order_status_name' => "已接单",
            'update_time'       => date("Y-m-d H:i:s"),
            'tel'               => $rs_staff['stTel']
            );

        $rs_order = $order->where("order_id={$order_id}")->save($va_order);
        $rt_order = $order->where("order_id={$order_id}")->find();
        if ($rs_order) {
            $push     = A('Push');
            $push->push($_POST['stId'],$rt_order['order_sn'],$rt_order['order_type'],'acts');
        }else{
            $this->error("发单失败，请重试");
        }
        
    }


    //催单
    public function RemindOrder(){
        $order_id = $_GET['order_id'];
        $order    = M('order_info');
        $rs_order = $order->where("order_id={$order_id}")->find();

        $push     = A('Push');
        $push->push($rs_order['stId'],$rs_order['order_sn'],$rt_order['order_type']);
    }


    public function orderdetail(){
        $this->LoginTrue();
        $order_id = $_GET["order_id"];
        $order    = M("order_info");
        $rs_order = $order->where("order_id={$order_id}")->find();
        if ($rs_order['add_time'] != "0000-00-00 00:00:00") {
            $rs_order['end_time'] = date("Y-m-d H:i:s",strtotime($rs_order['add_time'])+$rs_order['outtime']*60);
        }

        $sub_time = (time()-strtotime($rs_order['add_time']));
        if ( $sub_time < 3600) {
            $is_outtime = 1;
        }else{
            $is_outtime = 2;
        }
        $this->assign('is_outtime',$is_outtime);
        $this->assign("rs_order",$rs_order);
        $this->display();
    }

}