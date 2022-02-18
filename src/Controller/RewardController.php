<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ContentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/reward", name="reward_")
 */
class RewardController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository, ContentRepository $contentRepository): Response
    {
        $catReward = $categoryRepository->findOneBy(['name' => 'reward']);
        $rewards = $contentRepository->findBy(['category' => $catReward], ['date' => 'ASC']);

        return $this->render('reward/index.html.twig', ['rewards' => $rewards]);
    }

}
