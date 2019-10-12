<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sonata\Twig\FlashMessage\FlashManager;

class HomeController extends BaseController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        // $flashManager = $this->container->get('sonata.core.flashmessage.manager');
        // $flashManager = $this->container->get(FlashManager::class);
        // $flashManager = $this->flashManager;
        // $messages = $flashManager->get('success');
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
