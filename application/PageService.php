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

    public function getCategory($cat_id,$model=''){
        $map = 'catid = '.$cat_id;
        $map .= ' and (status = 1 or (status = 0 and createtime <'.time().'))';
        $category =  Db::name('category')->where('id',$cat_id)->find();
        if($model){
            $category['list'] = $model->where($map)->order('sort asc,createtime desc')->select();
        }
        return  $category;
    }

    public function getOne($cat_id){
        $arrchildid = db('category')->where(['id' => $cat_id])->value('arrchildid');
        $map = ' ';
        if ($arrchildid != input('catId')) {
            $map .= "article.catid in ($arrchildid)";
        } else {
          return $this->getPage($cat_id);
        }
        $map .= ' and article.address_id = ' . session('address_id');
        $map .=' and article.status = 1 or (article.status = 0 and article.createtime <'.time().')';
       return  Db::name('article')->leftJoin('clt_category cat','cat.id=article.catid')
           ->where($map)->field('article.*,cat.catname,cat.image,cat.imageMobile,cat.catdir')  ->find();
    }
}
