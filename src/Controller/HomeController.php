<?php

namespace App\Controller;

use App\Entity\PersonnalContent;
use App\Entity\Project;
use App\Repository\PersonnalContentRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="home_")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(PersonnalContentRepository $personnalContentRepository,
                          ProjectRepository $projectRepository): Response
    {


        return $this->render('home/index.html.twig', [
            'my_profile' => $personnalContentRepository->findOneBy([]),
            'projects' => $projectRepository->findBy([], ['date' => 'ASC'], 3),
        ]);
    }
}
