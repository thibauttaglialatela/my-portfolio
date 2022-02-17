<?php

namespace App\Controller;

use App\Entity\Content;
use App\Repository\CategoryRepository;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/formation", name="formation_")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository, ContentRepository $contentRepository): Response
    {
        $catFormation = $categoryRepository->findOneBy(['name' => 'formation']);

        return $this->render('formation/index.html.twig', [
            'formations' => $contentRepository->findBy(['category' => $catFormation], ['date' => 'DESC'])
        ]);
    }

    /**
     * @Route("/show/{id}", name="show", methods={"GET"})
     * @ParamConverter("content", class="App\Entity\Content")
     */
    public function show(Content $content): Response
    {


        return $this->render('formation/show.html.twig', [
            'content' => $content,
        ]);
    }
}
