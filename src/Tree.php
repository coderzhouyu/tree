<?php

namespace zhouyu;
class Tree
{
    /**
     * 获取一个附加层级的一维数组
     */
    static public function getArray ($cate,$pidname='pid', $html = '--', $pid = 0, $level = 0) {
        $arr = array();
        foreach ($cate as $k => $v) {
            if ($v[$pidname] == $pid) {
                $v['level'] = $level + 1;
                $v['html']  = str_repeat($html, $level);
                $arr[] = $v;
                $arr = array_merge($arr, self::getArray($cate,$pidname, $html, $v['id'], $level + 1));
            }
        }
        return $arr;
    }
    /**
     * 获取一个树形数组
     */
    static public function getTree ($cate,$pidname='pid', $name = 'child', $pid = 0, $level = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v[$pidname] == $pid) {
                $v['level'] = $level + 1;
                $v[$name] = self::getTree($cate,$pidname, $name, $v['id'], $level + 1);
                $arr[] = $v;
            }
        }
        return $arr;
    }
    //传递一个子分类ID返回所有的父级分类
    static public function getParents ($cate, $id,$pidname='pid') {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($cate, $v[$pidname]), $arr);
            }
        }
        return $arr;
    }
    //传递一个父级分类ID返回所有子分类ID
    Static Public function getChildsId ($cate, $pid,$pidname='pid') {
        $arr = array();
        foreach ($cate as $v) {
            if ($v[$pidname] == $pid) {
                $arr[] = $v['id'];
                $arr = array_merge($arr, self::getChildsId($cate, $v['id'],$pidname));
            }
        }
        return $arr;
    }
    //传递一个父级分类ID返回所有子分类
    static public function getChilds ($cate, $pid,$pidname) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v[$pidname] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr, self::getChilds($cate, $v['id']));
            }
        }
        return $arr;
    }
}
