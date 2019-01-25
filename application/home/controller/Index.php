<?php
namespace app\home\controller;
use think\Db;
use clt\Lunar;
use think\facade\Env;
class Index extends Common{
    public function initialize(){
        parent::initialize();
    }
    public function index(){

        return $this->fetch();
    }

    public function senmsg(){
        $data = input('post.');
        $data['addtime'] = time();
        $data['ip'] = getIp();

        db('message')->insert($data);
        $result['status'] = 1;
        return $result;
    }
    public function down($id=''){
        $map['id'] = $id;
        $files = Db::name('download')->where($map)->find();
        return download(Env::get('root_path').'public'.$files['files'], $files['title']);
    }

    public function setConfig(){
        $address_id = input('address_id');
        session('address_id',$address_id);
        $title = db('address')->where('id',$address_id)->value('title');
        session('address_name',$title);
        $address_id =   session('address_id');
        echo $address_id;
    }
}