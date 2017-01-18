<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/24
 * Time: 16:52
 */

namespace Home\Controller;
use Think\Controller;
class TestController extends Controller
{
    public function Test(){
//        import('ThinkPHP.Util.AjaxPage');
//        require THINK_PATH.'Library/Org/Util/AjaxPage.class.php';
//        import("Org.Util.AjaxPage");
        $credit = M('index_info');
        $count = $credit->where('sorts = 4')->count(); //计算记录数
        $limitRows = 10; // 设置每页记录数
        $p = new  \Org\Util\AjaxPage($count, $limitRows,"list"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;
        $data = $credit->order('creat_time desc')->limit($limit_value)->select(); // 查询数据
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成
        $this->assign('list',$data);
        $this->assign('page',$page);
        $this->display();
    }
}