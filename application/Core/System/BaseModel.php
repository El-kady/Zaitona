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
}