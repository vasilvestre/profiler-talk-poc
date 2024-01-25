<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ShowSpeedscope extends AbstractController
{
    #[Route('/speedscope_iframe', name: 'speedscope_iframe', methods: ['GET'])]
    public function __invoke(): Response
    {
        return $this->render('speedscope_iframe.twig');
    }
}
