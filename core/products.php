<?php
class Product extends Fetch{
    function newProduct($values){
        $values = self::setValues($values);
        return self::insert('products', $values);
    }
    
    function brand($values, $arr){
        $values = self::setValues($values);
        $arr = self::setValues($arr);
        return self::update('brands', $values, $arr);
    }
    
    function query($table, $values, $arr){
        $values = self::setValues($values);
        $arr = self::setValues($arr);
        return self::update($table, $values, $arr);
    }

    function blog($values){
        $values = self::setValues($values);
        return self::insert('blog_post', $values);
    }
}
?>
