<?php
namespace Level3\Demo\Controllers;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class Index {
    public function main(Request $request)
    {
        return 'hola';
    }
}
