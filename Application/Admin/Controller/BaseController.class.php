<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10
 * Time: 17:15
 */

namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{
    protected $userId = null;
    public function __construct()
    {
        parent::__construct();

        if (!session('?admin')) {
            $this->error('请先登录', U('Admin/Login/index'));
        }
        $this->userId = session('admin.id');
    }

}