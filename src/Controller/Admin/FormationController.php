<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Content;
use App\Form\ContentType;
use App\Repository\CategoryRepository;
use App\Repository\ContentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/formation", name="formation_")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ContentRepository $contentRepository,
                          CategoryRepository $categoryRepository): Response
    {
        $catFormation = $categoryRepository->findOneBy(['name' => 'formation']);

        return $this->render('admin/formation/index.html.twig', [
            'formations' => $contentRepository->findBy(['category' => $catFormation])
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $content = new Content();
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($content);
            $entityManager->flush();

            return $this->redirectToRoute('admin_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/formation/new.html.twig', [
            'content' => $content,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Content $content): Response
    {
        return $this->render('admin/formation/show.html.twig', [
            'content' => $content,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Content $content, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/formation/edit.html.twig', [
            'content' => $content,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Content $content, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$content->getId(), $request->request->get('_token'))) {
            $entityManager->remove($content);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
