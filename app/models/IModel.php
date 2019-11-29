<?php

namespace App\Models;

interface IModel{
    public function save();
    public function read();
    public function update();
    public function delete();
}
