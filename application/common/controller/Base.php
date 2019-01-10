<?php
namespace app\common\controller;

use think\Controller;

class Base extends Controller{
    protected $noLogin = [];    //放入不需要检测是否登录的方法
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        !$this->checkLogin() && $this->redirect('admin/index/login');
    }

    //退出登录
    public function logout(){
        session('admin_user', null);
        $this->redirect('admin/index/login');
    }

    public function checkLogin(){
        if(!is_admin_login()&&!in_array($this->request->action(),$this->noLogin)){
            return false;
        }else{
            return true;
        }
    }
}
?>