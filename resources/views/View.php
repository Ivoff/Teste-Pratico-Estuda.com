<?php

namespace Resources\Views;

class View {

    private $filePath;

    public function __construct($file)
    {
        $this->filePath = $file;
    }

    public function redirect()
    {
        require $this->filePath;
    }

    public function with($key, $data)
    {
        $_POST[$key] = $data;

        return $this;
    }

}
