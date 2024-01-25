<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\InsertedObject;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileThisRequest extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $objectManager,
    )
    {
    }

    #[Route('/profile-this-request/{profiler}', name: 'profile_this_request', methods: ['POST'])]
    public function __invoke(string $profiler)
    {
        switch ($profiler) {
            case 'xdebug':
                // Enabled with XDEBUG_TRIGGER
                break;
            case 'xhprof':
                xhprof_enable();
                register_shutdown_function(function () {
                    $data = xhprof_disable();
                    file_put_contents('public/xhprof/'. uniqid() . '.yourapp.xhprof', serialize($data));
                });
                break;
            case 'excimer':
                $excimer = new \ExcimerProfiler();
                $excimer->setPeriod( 0.001 ); // 1ms
                $excimer->setEventType(EXCIMER_REAL);
                $excimer->start();
                register_shutdown_function( function () use ( $excimer ) {
                    $excimer->stop();
                    $data = $excimer->getLog()->getSpeedscopeData();
                    $data['profiles'][0]['name'] = $_SERVER['REQUEST_URI'];
                    file_put_contents('public/excimer/speedscope.json', json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ));
                } );

                break;
            default:
                throw new \Exception('Unknown profiler');
        }

        foreach (range(1, 100) as $i) {
            $newObject = new InsertedObject();
            $newObject->setName('Object ' . $i);
            $this->objectManager->persist($newObject);
        }

        $this->objectManager->flush();

        return new Response();
    }
}
