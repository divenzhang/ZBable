<?php
namespace Addons\Niubable\Controller;
use Home\Controller\AddonsController;
class NiubableController extends AddonsController
{
    public function index()
    {
        $data = M('index_info');
        $time = date("Y-m-d H:i:s",strtotime("2016-11-24"));
        $banner =$data->where('sorts=0')->select();
        $indexUpdate = $data->where('flag<20 AND flag>0')->order('flag')->limit(8)->select();
        $indexHot = $data->where('flag>20')->order('flag')->limit(8)->select();
        $indexLike = $data->limit(4)->where("creat_time > '$time'AND sorts>0 AND flag=0")->order('rand()')->select();
        $this->assign('banner',$banner);
        $this->assign('indexUpdate', $indexUpdate);
        $this->assign('indexHot', $indexHot);
        $this->assign('indexLike', $indexLike);
        $this->display();
    }

    public function getListJsonInfo()
    {
        $sorts = $_POST["data"];
        $info = M('index_info');
        $lists = $info->order('creat_time desc')->where("sorts=$sorts")->select();
        $this->ajaxReturn($lists);
    }

}