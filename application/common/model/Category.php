<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/6/21
 * Time: 11:05
 */
namespace app\common\model;

class Category extends Base
{
    protected  $autoWriteTimestamp = true;

    public function getCategoryList(){
        return $this->select();
    }
    public function addCategory($data){
        $data = [
            'name' => $data['name'],
            'parent_id' => $data['parent_id'],
            'status' => 1
        ];
        return $this->save($data);
    }
    /**
     *根据父级id获取所有生活服务分类
     */
    public function getCategoryByPid($pid){
        $data = [
            "parent_id" => $pid
        ];
        $result = $this->where($data)->select();
        return $result;
    }
}