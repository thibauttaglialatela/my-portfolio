<?php

namespace App\Controller\Admin;

use App\Entity\PersonnalContent;
use App\Form\PersonnalContentType;
use App\Repository\PersonnalContentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/personnal/content", name="personnal_content_")
 */
class PersonnalContentController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(PersonnalContentRepository $personnalContentRepository): Response
    {
        return $this->render('admin/personnal_content/index.html.twig', [
            'personnal_contents' => $personnalContentRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(PersonnalContent $personnalContent): Response
    {
        return $this->render('admin/personnal_content/show.html.twig', [
            'personnal_content' => $personnalContent,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, PersonnalContent $personnalContent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonnalContentType::class, $personnalContent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_personnal_content_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/personnal_content/edit.html.twig', [
            'personnal_content' => $personnalContent,
            'form' => $form,
        ]);
    }

}
