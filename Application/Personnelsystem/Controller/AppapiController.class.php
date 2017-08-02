<?php
namespace Personnelsystem\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AppapiController extends Controller {

  //登陆接口
  public function Index(){
    $data = $_POST;
    // var_dump($data);die;
    if (isset($data) && $data['mobile'] && $data['password']) {
      $staff = M("staff");
      $rst=$staff->field("stId,stName,stPwd,stTel")->where("stTel='".$data['mobile']."'")->find();
      if (isset($data['mobile']) && $data['mobile'] == $rst['stTel']) {
        $rst1 = true;
      }else{
        $ret1 = array(
          'code'    => 201,
          'message' => '电话号码不正确'
          );
        exit(json_encode($ret1));
      }

      if (isset($data['password']) && md5($data['password']) == $rst['stPwd']) {
         $rst2 = true;
      }else{
        $ret2 = array(
          'code'    => 202,
          'message' => '密码错误'
          );
        exit(json_encode($ret2));
      }

      if ($rst2 && $rst1) {
        $ret3 = array(
          'code'   => 200,
          'stId'   => $rst['stId'],
          'stName' => $rst['stName']
          );
        exit(json_encode($ret3));
      }
    }else{
      $ret4 = array(
        'code'    => 203,
        'message' => '未知错误'
        );
      exit(json_encode($ret4));
    }
  }

  //注册
  public function register(){
    $data = $_POST;
    if (isset($data)) {
      if (!empty($data['mobile']) && !empty($data['password'])) {
        $staff = M('staff');
        $st_info = $staff->where("stTel='".$data['mobile']."'")->find();
        if (!empty($st_info)) {
          $ret = array(
            'code'    => 104,
            'message' => '电话号码已注册'
          );
          exit(json_encode($ret));
        }
        
        $info  = array(
          'stTel'  => $data['mobile'],
          'stPwd'  => md5($data['password']),
          'stName' => $data['stName']
          );
        $rst = $staff->add($info);
        if ($rst) {
          $ret = array(
            'code'    => 101,
            'message' => '注册成功'
            );
          exit(json_encode($ret));
        }else{
          $ret = array(
            'code'    => 102,
            'message' => '注册失败'
            );
          exit(json_encode($ret));
        }
      }else{
        $ret = array(
          'code'    => 103,
          'message' => '电话号码或者密码为空'
          );
        exit(json_encode($ret));
      }
    }
  }


  //获取新的订单
  public function get_new_order(){
    $order = M('order_info');
    $order_info = $order->field("order_id,order_sn,order_status,username,mobile,img_url,add_time,outtime,order_type")->where('order_status=0 AND del_flag=0')->select();
    if (empty($order_info)) {
      $ret = array(
          'code'    => 301,
          'message' => '没有新的订单'
          );
        exit(json_encode($ret));
    }else{
      exit(json_encode($order_info));
    } 
  }

  //员工接单
  public function staff_order_taking(){
    $data = $_POST;

    if (isset($data['stId']) && ($data['stId'] || $data['mobile'] ) && $data['order_id']) {
      $order = M('order_info');

      //判断是否有未完成的订单
      // $not_finish = $order->where("order_status=1 AND (stId=".$data['stId']." OR tel='".$data['mobile']."')")->find();
      // if (!empty($not_finish)) {
      //   $res = array(
      //     'code'    => 109,
      //     'message' => '还有未完成的订单'
      //     );
      //   exit(json_encode($res));
      // }
      //判断订单是否存在
      $ret   = $order->where('order_id='.$data['order_id'])->find();
      if (empty($ret)) {
        $res = array(
          'code'    => 105,
          'message' => '该订单不存在'
          );
        exit(json_encode($res));
      }

      if ($ret['order_status'] >=1) {
        $res = array(
          'code'    => 106,
          'message' => '该订单已被接单或者完成'
          );
        exit(json_encode($res));
      }

      if ($ret['del_flag'] ==1) {
        $res = array(
          'code'    => 107,
          'message' => '该订单已删除'
          );
        exit(json_encode($res));
      }

      $up_order = array(
          'order_status'      => 1,
          'order_status_name' => '已接单',
          'confirm_time'      => date("Y-m-d H:i:s"),
          'stId'              => $data['stId'],
          'update_time'       => date("Y-m-d H:i:s"),
          'tel'               => $data['mobile']
        ) ;
      $rst = $order->where('order_id='.$data['order_id'])->save($up_order);

      if ($rst) {
        $order_info = $order->field("order_id,order_sn, order_status, stId, tel, mobile, username, address, img_url,add_time,confirm_time,outtime,order_type")->where('order_id='.$data['order_id'])->find();
        $order_info['sended_time'] = date("Y-m-d H:i:s",strtotime($order_info['add_time'])+$order_info['outtime']*60); 
        $ret = array(
          'code'       => 108,
          'message'    => '接单成功',
          'order_info' => $order_info
          );
        exit(json_encode($ret));
      }
    }else{
      $ret4 = array(
        'code'    => 203,
        'message' => '未知错误'
        );
      exit(json_encode($ret4));
    }
  }


  //配送员当前所有的订单
  public function staff_current_order(){
    $data = $_POST;
    if (!empty($data['stId']) || !empty($data['mobile'])) {
      $order         = M('order_info');
      $current_order = $order->field("order_id,order_sn, order_status, stId, tel, mobile, username, address, img_url, add_time, confirm_time,outtime,order_type")->where("order_status=1 AND del_flag=0 AND (stId=".$data['stId']." OR tel='" .$data['mobile']. "' ) ")->order('add_time desc')->select();

      foreach ($current_order as $key => $value) {
        $current_order[$key]['sended_time'] = date("Y-m-d H:i:s",strtotime($value['add_time'])+$value['outtime']*60);
      }
      
      if (!empty($current_order)) {
        exit(json_encode($current_order));
      }else{
        $res = array(
          'code'    => 113,
          'message' => '无当前订单'
          );
        exit(json_encode($res));
      }
    }else{
      $res = array(
        'code'    => 203,
        'message' => '未知错误'
        );
      exit(json_encode($res));
    }
  }


  //配送员历史的订单
  public function staff_history_order(){
    $data = $_POST;
    if (!empty($data['stId']) || !empty($data['mobile'])) {
      $order = M('order_info');
      $finish_order = $order->field("order_id,order_sn, order_status, stId, tel, mobile, username, address, img_url, add_time, confirm_time, finished_time,outtime,order_type")->where("del_flag=0 AND (stId=".$data['stId']." OR tel='" .$data['mobile']. "' ) ")->order('add_time desc')->limit($data['page']*20,20)->select();

      // foreach ($finish_order as $key => $value) {
      //   $finish_order[$key]['img_url'] = $_SERVER['HTTP_HOST']."/".$finish_order['img_url'];
      // }
      foreach ($finish_order as $key => $value) {
        $finish_order[$key]['sended_time'] = date("Y-m-d H:i:s",strtotime($value['add_time'])+$value['outtime']*60);
      }
      if (!empty($finish_order)) {
        exit(json_encode($finish_order));
      }else{
        $res = array(
          'code'    => 113,
          'message' => '没有完成的订单'
          );
        exit(json_encode($res));
      }
    }else{
      $res = array(
        'code'    => 203,
        'message' => '未知错误'
        );
      exit(json_encode($res));
    }
  }

  //配送员订单完成接口
  public function staff_finish_order(){
    $data = $_POST;
    if (!empty($data) && $data['order_id']) {
      $order        = M('order_info');
      $order_info   = $order->field("order_id, confirm_time,outtime")->where("order_id=".$data['order_id'])->find();
      
      $up_order     = array(
        'order_status'      => 2,
        'order_status_name' => '已完成',
        'finished_time'     => date("Y-m-d H:i:s",time())
        );
      if ((time()-strtotime($order_info['confirm_time']))>$order_info['outtime']*60) {//超时
        $up_order     = array(
          'order_status'      => 3,
          'order_status_name' => '超时',
          'finished_time'     => date("Y-m-d H:i:s",time())
        );
      }

      $ret = $order->where("order_id=".$data['order_id'])->save($up_order);
      if ($ret) {
        $res = array(
          'code'    => 114,
          'message' => '订单完成操作成功'
          );
        exit(json_encode($res));
      }else{
        $res = array(
          'code'    => 115,
          'message' => '订单完成操作失败'
          );
        exit(json_encode($res));
      }
    }else{
      $res = array(
        'code'    => 203,
        'message' => '未知错误'
        );
      exit(json_encode($res));
    }
  }


  //订单统计数据
  public function count_info(){
    $data = $_POST;
    if ($data) {
      $order = M('order_info');


      $start=date('Y-m-01 00:00:00');
      $end = date('Y-m-d H:i:s');
      
      $where['add_time'] = array('between',array($start,$end));
      // $where['add_time'] = array(
      //     array('egt',strtotime(date('Y-m',time()))),
      //     array('lt',strtotime(date('Y-m',time()).'+1 month'))
      // );

      //本月订单数据
      $where['tel']      = $data['mobile'];
      $where['del_flag'] = 0;
      //本月所有订单数
      $mall      = $order->where($where)->count();

      //本月完成订单数
      $where['order_status'] = 2;
      $mfinished = $order->where($where)->count();

      //本月超时订单数
      $where['order_status'] = 3;
      $mouttime = $order->where($where)->count();

      //所有订单数据
      $condition             = array('tel'=>$data['mobile']);
      $condition['del_flag'] = 0;
      //所有订单数
      $aorder = $order->where($condition)->count();

      //所有完成订单数
      $condition['order_status'] = 2;
      $afinished = $order->where($condition)->count();

      //所有完成订单数
      $condition['order_status'] = 3;
      $aouttime = $order->where($condition)->count();

      $order_info = array(
        'mall'      => $mall,
        'mfinished' => $mfinished,
        'mouttime'  => $mouttime,
        'aorder'    => $aorder,
        'afinished' => $afinished,
        'aouttime'  => $aouttime,
        'start'     =>$start,
        'end'       =>$end
       );
      exit(json_encode($order_info));
    }else{
      $res = array(
        'code'    => 203,
        'message' => '未知错误'
        );
      exit(json_encode($res));
    }

  }
}
