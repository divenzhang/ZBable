<?php
namespace Admin\Controller;

class IndexController extends BaseController {
    public function index(){
        $model =M('index_info');

        $data['all']=$model->where('flag>10 AND flag<35')->count('click');
        $data['max'] = $model->where('flag>10')->max('click');
        $data['min'] =$model->where('flag>10')->min('click');
        $this->assign('data',$data);
        $this->display();
    }
}