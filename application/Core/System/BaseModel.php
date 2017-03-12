<?php

namespace Core\System;

use \Core\Service\Service;

class BaseModel
{
    protected $table;
    protected $fields = array();

    public function getRow($value,$field = "id")
    {
        return Service::getDatabase()->fetchRow(
            sprintf("SELECT * FROM %s WHERE %s = :value LIMIT 1",$this->table,$field),
            array(
                ":value" => $value
            )
        );
    }

    public function getAll($limit = 0,$offset = 0)
    {
        $sql = sprintf("SELECT * FROM %s ",$this->table);

        if ($limit > 0) {
            $sql .= sprintf("LIMIT %d OFFSET %s",$limit,$offset);
        }

        return Service::getDatabase()->fetchAll($sql);
    }

    public function getAllByCond($value,$field = "id",$orderby = "",$order = "")
    {
        return Service::getDatabase()->fetchAll(
            sprintf("SELECT * FROM %s WHERE %s = :value %s %s",$this->table,$field,$orderby,$order),
            array(
                ":value" => $value
            )
        );
    }

    public function buildTree($items) {
        $children = array(array());

        foreach($items as &$item) $children[$item['parent_id']][] = &$item;
        unset($item);

        foreach($items as &$item) if (isset($children[$item['id']]))
            $item['children'] = $children[$item['id']];

        return $children[0];
    }


    public function insert($data){
        return Service::getDatabase()->insert($this->table,$data);
    }

    public function update($data, $where="", $bind=array()){
        return Service::getDatabase()->update($this->table,$data, $where, $bind);
    }

    public function save($data, $where = "", $bind = array()){
        return Service::getDatabase()->save($this->table,$data, $where, $bind);
    }

    public function delete($where = "", $bind = array()){
        return Service::getDatabase()->delete($this->table, $where, $bind);
    }
}