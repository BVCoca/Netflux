<?php

namespace App\Controller;

use App\Entity\Video;
use App\Entity\Episode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideoDetailController extends AbstractController
{
    #[Route('/video/detail/{slug}/{id}', name: 'app_video_detail')]
    public function index($id, EntityManagerInterface $manager): Response
    {

        $video = $manager->getRepository(Video::class)->find($id);
        $episodes = $manager->getRepository(Episode::class)->findBy(['video' => $video]);
    

        return $this->render('video_detail/index.html.twig', [
            'video' => $video,
            'episodes' => $episodes,
        ]);
    }
}
