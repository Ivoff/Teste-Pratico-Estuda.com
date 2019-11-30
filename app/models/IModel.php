<?php

namespace App\Models;

interface IModel{
    public function save();
    public function read($id);
    public function delete();
    public function all();
}
