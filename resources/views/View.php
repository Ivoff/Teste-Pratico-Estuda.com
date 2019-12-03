<?php

namespace Resources\Views;

class View {

    private $filePath;
    private $data = [];

    public function __construct($file)
    {
        $this->filePath = $file;
    }

    public function redirect()
    {
        if(!empty($this->data))
        {
            foreach ($this->data as $key => $value)
            {
                ${$key} = $value;
            }
        }
        require $this->filePath;
    }

    public function with($data)
    {
        foreach ($data as $key => $value)
        {
            $this->data[$key] = $value;
        }

        return $this;
    }

}
