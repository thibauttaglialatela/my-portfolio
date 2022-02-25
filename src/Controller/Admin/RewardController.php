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
 * @Route("/reward", name="reward_")
 */
class RewardController extends AbstractController
{


    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository, ContentRepository $contentRepository): Response
    {
        $catReward = $categoryRepository->findOneBy(['name' => 'reward']);
        return $this->render('admin/reward/index.html.twig', [
            'rewards' => $contentRepository->findBy(['category' => $catReward])
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

            return $this->redirectToRoute('admin_reward_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/reward/new.html.twig', [
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

            return $this->redirectToRoute('admin_reward_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/reward/edit.html.twig', [
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

        return $this->redirectToRoute('admin_reward_index', [], Response::HTTP_SEE_OTHER);
    }
}
