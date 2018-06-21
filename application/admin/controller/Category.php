<?php
/**
 * Created by PhpStorm.
 * User: sj
 * Date: 2018/6/18
 * Time: 17:18
 */

namespace app\admin\controller;
use think\Controller;

class Category extends Controller
{
    public $cateModel;
    public function _initialize() {
        $this->cateModel = model("Category");
    }

    public function index(){
        $cateList = $this->cateModel->getCategoryList();
        return $this->fetch('',[
            'cateList' => $cateList
        ]);
    }

    /**
     * 新增或编辑生活服务分类
     * @return mixed
     */
    public function add(){
        $cateList = $this->cateModel->getCategoryList();
        return $this->fetch('',[
            'cateList' => $cateList
        ]);
    }
    public function save(){
        $data = input("post.");
        $validate = validate("Category");
        $data['name'] = htmlentities($data['name']);
        if(!$validate->scene('add')->check($data)){
            $this->error($validate->getError());
        }
        $res = $this->cateModel->addCategory($data);
        if($res){
            $this->success('新增成功');
        }else{
            $this->error('新增失败');
        }
    }
}