<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetProfilerListController extends AbstractController
{
    #[Route('/', name: 'app_dashboard')]
    public function __invoke(): Response
    {
        return $this->render('index.html.twig');
    }
}
