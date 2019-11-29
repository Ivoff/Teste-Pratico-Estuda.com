<?php

namespace Controllers;

interface IController
{
    public function index();
    public function store();
    public function edit();
    public function destroy();
}
