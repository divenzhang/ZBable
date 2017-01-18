<?php
/**
 * Created by PhpStorm.
 * User: Xcube
 * Date: 2017/1/3
 * Time: 15:59
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Crypt\Driver\Think;
class AdjustController extends BaseController
{
    public function index(){
        $index_info = M('index_info');
        $info_one = $index_info->where('flag<20 AND flag>0')->order('flag')->select();
        $info_two = $index_info->where('flag>20 AND flag<30')->order('flag')->select();
        $info_three=$index_info->where('flag>30')->order('flag')->select();
        $info_banner=$index_info->where('sorts=0')->order('serial')->select();

        $this->assign('one',$info_one);
        $this->assign('two',$info_two);
        $this->assign('three',$info_three);
        $this->assign('banner',$info_banner);
        $this->display();
    }
    public function image(){
        $upload = new \Think\Upload();
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath = './ico/'; // 设置附件上传目录
        $upload->saveName = date('YmdHis');
        $upload->saveExt = '';
        $upload->subName = "";
        $upload->replace = true;
        $upload->hash = false;
        $info = $upload->upload();
        if (!$info) {
            $msg['code'] = 0;
            $msg['msg'] = $upload->getError();
        } else {
            $msg['code'] = 1;
            $msg['msg'] = 'success';

            foreach ($info as $file) {
                $new_path = $file['savename'];
            }
            $msg['url'] = '/Uploads/ico/' . $new_path;
        }

        $this->ajaxReturn($msg);

    }

    public function modify(){
        if (!IS_POST) {
            E('页面不存在', 404);
        }

        $arr = I();
        $data['name']=$arr['name'];
        $data['briefing']=$arr['briefing'];
        $data['aurl']=$arr['aurl'];
        $data['imgurl']=$arr['imgurl'];
        $change_id = $arr['btn_id'];
        $image = $arr['new_img'];

        $data['imgurl'] = (!$image) ? $arr['imgurl'] :$image ; //判断有没有上传照片
        $modify = M('index_info');
        $change = $modify->where("id =$change_id")->getField('flag');//根据修改前ID 拿到原来的flag
//        $new_flag = $change -($change %10) +$arr['flag'];  //取原来的标识符，十位上的数所为行数标志
//        $new_flag = ($change >20)?$arr['flag'] +20:$arr['flag'] +10;
        $temp =$arr['sorts'].$arr['flag'];
        $new_flag = (int)$temp;
        $data['flag'] =$new_flag;

        if ($new_flag != $change){
            $change_data['flag']=$change;
            $modify->where("flag =$new_flag")->save($change_data);  //找到与更改冲突的交换flag
            $modify->where("id =$change_id")->save($data);          //把更改数据更新
            $msg['code'] = 1;
            $msg['msg'] = "更新成功";

        }else{
            $modify->where("id =$change_id")->save($data);
            $msg['code'] = 1;
            $msg['msg'] = "更新成功";
        }
        $this->ajaxReturn($msg);
    }
    public function editban(){
        $arr=I();
        $carousel =M('index_info');
        $id =$arr['id'];
        $serial =$arr['serial'];
        $old_serial['serial']=$carousel->where("id=$id")->getField('serial');
        if(empty($arr['aurl'])){
            $msg['msg']='请填写链接！';
        }else{
            $carousel->where("sorts=0 AND serial=$serial")->save($old_serial);
            $carousel->where("id=$id")->save($arr);
            $msg['msg']='修改成功！';
        }
        $this->ajaxReturn($msg);

    }
}