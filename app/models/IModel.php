<?php

namespace App\Models;

interface IModel{
    public function save();
    public function read($id);
    public function delete();
    public static function all();
    public static function search($query);
}
