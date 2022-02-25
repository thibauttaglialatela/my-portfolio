<?php

namespace App\Controller\Admin;

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
 * @Route("/skills", name="skills_")
 */
class SkillsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ContentRepository $contentRepository, CategoryRepository $categoryRepository): Response
    {
        $catSkill = $categoryRepository->findOneBy(['name' => 'skill']);
        return $this->render('admin/skills/index.html.twig', [
            'skills' => $contentRepository->findBy(['category' => $catSkill])
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

            return $this->redirectToRoute('admin_skills_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/skills/new.html.twig', [
            'content' => $content,
            'form' => $form,
        ]);
    }

    /**
     * @Route ("/{id}/edit", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Content $content, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_skills_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/skills/edit.html.twig', [
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

        return $this->redirectToRoute('admin_skills_index', [], Response::HTTP_SEE_OTHER);
    }
}
