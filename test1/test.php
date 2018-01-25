<?php
namespace app\index\controller;
use think\Controller;
use think\Session;

class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize(); //集成父类中的初始化操作
        define('USER_NAME', Session::get('user_name'));
    }

    //判断用户是否登陆，放在后台的入口：index/index
    protected function isLogin()
    {
        if(empty(USER_NAME)){
            //$this -> error('wrong!!');
            $this -> redirect('user/login');
            //$this -> view -> fetch('user/login');
            //$this -> view -> fetch('user/login');
            //$this->error('You have not logged in!',url('user/login'));
        }
    }

    //防止用户重复登陆
    protected function alreadyLogin()
    {
        if(!empty(USER_NAME)){
            $this -> error('You have already logged in!', url('index/index'));
        }
    }

}