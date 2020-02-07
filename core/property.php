<?php
class Property extends Fetch{
    function newData($table, $values){
        $values = self::setValues($values);
        return self::insert($table, $values);
    }
    
    function updateData($table, $values, $arr){
        $values = self::setValues($values);
        $arr = self::setValues($arr);
        return self::update($table, $values, $arr);
    }

    function deleteData($table, $values){
        $values = self::setValues($values);
        return self::delete($table, $values);
    }
}
?>
