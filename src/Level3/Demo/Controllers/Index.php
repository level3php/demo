<?php
namespace Level3\Demo\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Index {
    use Helper\EntityManager;
z
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function main(Application $app, Request $request)
    {
        foreach ($this->getRepository('Album')->findBy([]) as $album) {
            var_dump($album->toArray());
            var_dump($album->getArtist()->toArray());
            foreach ($album->getTracks() as $track) {
                var_dump($track->toArray());
            }
        }

        return 'hola';
    }
}
