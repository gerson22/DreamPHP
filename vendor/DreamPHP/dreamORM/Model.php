<?php

class Model extends ORM{
    public function __construct($data = null) {
        parent::__construct();
        if ($data && sizeof($data)) {
            $this->populateFromRow($data);
        }
    }
    public function populateFromRow($data) {
        $props = get_class_vars(get_class($this));
        foreach($props as $key=>$value){
            foreach($data as $llave=>$val){
                if($key == $llave){
                    $this->$key = $val;
                }
            }
        }

    }
}
