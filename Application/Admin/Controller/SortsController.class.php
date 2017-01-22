<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/22
 * Time: 14:39
 */

namespace Admin\Controller;
use Think\Controller;

class SortsController extends Controller
{
    public function index(){
        $credit = M('index_info');
        $count = $credit->where('sorts = 4')->count(); //计算记录数
//        $limitRows = 10; // 设置每页记录数
//        $p = new  \Org\Util\AjaxPage($count, $limitRows,"list"); //第三个参数是你需要调用换页的ajax函数名
//        $limit_value = $p->firstRow . "," . $p->listRows;
//        $data = $credit->order('creat_time desc')->limit($limit_value)->select(); // 查询数据
//        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成
//        $this->assign('list',$data);
//        $this->assign('page',$page);
//        $this->display();


        $Page = new \Think\Page($count, 10);
        $list = $credit->where('sorts = 4')->limit($Page->firstRow, $Page->listRows)->order('id desc')->select();

        $this->assign('list', $list);
        $this->assign('page', $Page->show());
        $this->display();
    }
}