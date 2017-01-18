<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        $data = M('index_info');
//        $time = date("Y-m-d H:i:s",strtotime("2016-11-24"));
        $time = date('Y-m-d H:i:s', strtotime('-7 days'));
        $banner =$data->where('sorts=0')->select();
        $indexUpdate = $data->where('flag<20 AND flag>0')->order('flag')->limit(4)->select();
        $indexHot = $data->where('flag>20 AND flag<30')->order('flag')->limit(4)->select();
        $indexLike = $data->where("flag>30")->order('flag')->limit(4)->select();
        $indexSearch =$data->where("creat_time > '$time'AND sorts >0")->field('name,aurl')->limit(11)->select();
        $indexList = $data->where('sorts =4')->limit(8)->order('creat_time desc')->select();
        $indexList1 = $data->where('sorts =5')->limit(8)->order('creat_time desc')->select();
        $indexList2 = $data->where('sorts =6')->limit(8)->order('creat_time desc')->select();
        $indexList3 = $data->where('sorts =7')->limit(8)->order('creat_time desc')->select();

        $this->assign('banner',$banner);
        $this->assign('indexUpdate', $indexUpdate);
        $this->assign('indexHot', $indexHot);
        $this->assign('indexLike', $indexLike);
        $this->assign('indexSearch',$indexSearch);
        $this->assign('indexList',$indexList);
        $this->assign('indexList1',$indexList1);
        $this->assign('indexList2',$indexList2);
        $this->assign('indexList3',$indexList3);
        $this->display();
    }

    public function getListJsonInfo()
    {
        $arr = I();
        $sorts = $arr["data"];
        $info = M('index_info');
        if ($sorts ==4){
            $lists = $info->order('creat_time desc')->where("sorts=$sorts")->select();
        }else{
            $lists = $info->order('creat_time desc')->limit(9,100)->where("sorts=$sorts")->select();
        }
        $this->ajaxReturn($lists);
    }
    public function search(){
        $arr = I();
        $input=$arr['search'];
        $search =M('index_info');
        $where['name']=array('like',"%$input%");
        $result =$search->where($where)->limit(4)->select();
        if (!$result){
            $msg['code']=0;
        }
            $msg['result']=$result;
            $msg['key']=$input;
            $this->ajaxReturn($msg);


    }
    public function click(){
        $arr = I();
        $id =$arr["cid"];
        $msg['ud']=$id;
        $click =M('index_info');
        $total =$click->where("id=$id")->setInc('click');
        if (!$total){
            $msg['msg']='fail';
        }else{
            $msg['msg']='success';
        }

        $this ->ajaxReturn($msg);
    }

}