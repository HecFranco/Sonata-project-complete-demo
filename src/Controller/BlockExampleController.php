<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlockExampleController extends AbstractController
{
    /**
     * @Route("/block/example", name="block_example")
     */
    public function index()
    {
        return $this->render('block_example/index.html.twig', [
            'controller_name' => 'BlockExampleController',
        ]);
    }
}
