<?php

declare(strict_types=1);

namespace App\Controller\xdebug;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GetProfileOutputs extends AbstractController
{
    public function __construct()
    {
    }

    #[Route('/xdebug/profiles/outputs', name: 'xdebug_profile_outputs', methods: ['GET'])]
    public function __invoke(): Response
    {
        $files = glob('../public/xdebug/cachegrind.out.*');
        $files = array_map(function ($file) {
            return [
                'name' => basename($file),
                'time' => filemtime($file)
            ];
        }, $files);

        usort($files, function ($a, $b) {
            return $b['time'] <=> $a['time'];
        });

        return $this->render('xdebug/profile_list.html.twig', [
            'profiles' => $files,
        ]);
    }
}
