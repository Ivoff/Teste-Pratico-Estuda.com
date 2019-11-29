<?php

namespace App\Models;

interface IModel{
    public function create();
    public function read();
    public function update();
    public function delete();
}
