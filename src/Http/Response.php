<?php

namespace Koween\Vanillaframework\Http;

class Response
{
    protected $view;

    public function __contructor($view)
    {
        $this->view = $view;
    }

    public function getView()
    {
        return $this->view;
    }

    public function send()
    {
        $view = $this->getView();
        $content = file_get_contents(__DIR__ . "../../Views/$view.php");

        require __DIR__ . "../../Views/Layout.php";
    }
}