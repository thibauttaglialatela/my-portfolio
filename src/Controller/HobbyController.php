<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hobby", name="hobby_")
 */
class HobbyController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository, ContentRepository $contentRepository): Response
    {
        $catHobby = $categoryRepository->findOneBy(['name' => 'hobby']);
        $hobbies = $contentRepository->findBy(['category' => $catHobby]);

        return $this->render('hobby/index.html.twig', [
            'hobbies' => $hobbies,
        ]);
    }
}
