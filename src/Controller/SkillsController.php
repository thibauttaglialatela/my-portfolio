<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/skills", name="skills_")
 */
class SkillsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository, ContentRepository $contentRepository): Response
    {
        $catSkill = $categoryRepository->findOneBy(['name' => 'skill']);
        return $this->render('skills/index.html.twig', [
            'skills' => $contentRepository->findBy(['category' => $catSkill], ['date' => 'ASC'])
        ]);
    }
}
