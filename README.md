# un-limit-tree
php无限级分类

```
$array = [
 
];
```

获取一个附加层级的一维数组
```
Tree::getArray($array) 
```

获取一个树形数组
```
Tree::getTree($array) 
```

传递一个父级分类ID返回所有子分类ID
```
Tree::getChildsId($array,$pid)
```

传递一个父级分类ID返回所有子分类数组
```
Tree::getChilds($array,$pid)
```
