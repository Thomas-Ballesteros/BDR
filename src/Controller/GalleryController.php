<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AlbumRepository;

class GalleryController extends AbstractController
{
    /**
     * @Route("/gallery", name="gallery")
     */
    public function index(AlbumRepository $albumRepository)
    {
        return $this->render('gallery/index.html.twig', [
            'albums' => $albumRepository->findAll(),
        ]);
    }
}
