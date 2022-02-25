<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout(): void
    {

    }
}
