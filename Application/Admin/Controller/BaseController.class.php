<?php
/**
 * 后台的基类
 * Created by PhpStorm.
 * User: XCube
 * Date: 2016/12/2
 * Time: 9:56
 */

namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{ protected $userId = null;

    public function __construct()
    {
        parent::__construct();

        if (!session('?admin')) {
            $this->error('请先登录', U('Admin/Login/login'));
        }
        $this->userId = session('admin.id');
    }

}