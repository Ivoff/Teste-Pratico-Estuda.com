<?php

namespace Resources\Views;

use Routes\Router;

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

    public function with($data, $method)
    {
        if($method == "POST")
        {
            foreach ($data as $key => $value)
            {
                $_POST[$key] = $value;
            }
        }
        elseif ($method == 'SESSION')
        {
            session_start();

            foreach ($data as $key => $value)
            {
                $_SESSION[$key] = $value;
            }
        }


        return $this;
    }

}
