<?php
namespace Personnelsystem\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class PushController extends LoginTrueController{
	public function push($stId,$order_sn='',$order_type,$acts=''){
        // var_dump("$stId");die;
        vendor('jpush.autoload');  // 这个是thinkphp自己的方法 vendor 连接到我们的极光
        $app_key='945444018bc429e331681826'; //注册成开发者会提供这个
        $master_secret='4b1ef6fd14433034224693cc';//注册成开发者会提供这个
        $client = new \JPush\Client($app_key, $master_secret);

        if ($order_type == 1 ) {
            $desc = "美团";
        }elseif ($order_type == 2 ) {
            $desc = "饿了吗";
        }elseif ($order_type == 3 ) {
            $desc = "百度外卖";
        }elseif ($order_type == 4 ) {
            $desc = "口碑";
        }
        if ($acts=='acts') {
            $result = $client->push()
            ->setPlatform('all')
            // ->addAllAudience("$stId")
            ->addAlias($stId)
            ->setNotificationAlert('您有新的'.$desc.'订单了（单号'.$order_sn.'），请及时查收')
            ->send();

            if($result){
                $this->success("发单成功");
            }else{
                $this->error("发单失败");
            }
        }else{
            $result = $client->push()
                ->setPlatform('all')
                // ->addAllAudience("$stId")
                ->addAlias($stId)
                ->setNotificationAlert($desc.'订单（'.$order_sn.'）配送即将超时，请尽快配送')
                ->send();
            if($result){
                $this->success("催单成功");
            }else{
                $this->error("催单失败");
            }
        }
        
        
    }
}