<?php

namespace Koween\Vanillaframework\Http\Controllers;

use Koween\Vanillaframework\Http\Response;

class HomeController
{
    public function index()
    {
        return new Response('home');
    }
}