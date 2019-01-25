<?php
/**
 * Created by PhpStorm.
 * User: Q1369
 * Date: 2018/12/22
 * Time: 13:07
 */
namespace app\services;
use think\Db;

class PageService{
 public   function getPage($cat_id){
        $map = 'page.id = '.$cat_id;
        $map .= ' and (page.status = 1 or (page.status = 0 and page.createtime <'.time().'))';
        return $list = Db::name('page')->alias('page')->leftJoin('clt_category cat','cat.id=page.id')->where($map)->field('page.*,cat.catname,cat.image,cat.imageMobile,cat.catdir')->find();
    }

    public function getCategory($cat_id,$model){
        $map = 'catid = '.$cat_id;
        $map .= ' and (status = 1 or (status = 0 and createtime <'.time().'))';
        $category =  Db::name('category')->where('id',$cat_id)->find();
        $category['list'] = $model->where($map)->order('sort asc,createtime desc')->select();
        return  $category;
    }
}
