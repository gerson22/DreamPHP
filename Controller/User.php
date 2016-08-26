<?php

class User extends Model{
    public $id,$username,$id_session;
    protected static $table = 'users';

    public static function get(){
        $usuarios = User::where('id',1);
        var_dump($usuarios);
    }
}
