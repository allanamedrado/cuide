<?php

namespace App\Controller;

use App\Entity\Exame;
use App\Form\ExameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exame")
 */
class ExameController extends AbstractController
{
    /**
     * @Route("/", name="exame_index", methods={"GET"})
     */
    public function index(): Response
    {
        $exames = $this->getDoctrine()
            ->getRepository(Exame::class)
            ->findAll();

        return $this->render('exame/index.html.twig', [
            'exames' => $exames,
        ]);
    }

    /**
     * @Route("/new", name="exame_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $exame = new Exame();
        $form = $this->createForm(ExameType::class, $exame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($exame);
            $entityManager->flush();

            return $this->redirectToRoute('exame_index');
        }

        return $this->render('exame/new.html.twig', [
            'exame' => $exame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{exameId}", name="exame_show", methods={"GET"})
     */
    public function show(Exame $exame): Response
    {
        return $this->render('exame/show.html.twig', [
            'exame' => $exame,
        ]);
    }

    /**
     * @Route("/{exameId}/edit", name="exame_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Exame $exame): Response
    {
        $form = $this->createForm(ExameType::class, $exame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exame_index');
        }

        return $this->render('exame/edit.html.twig', [
            'exame' => $exame,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{exameId}", name="exame_delete", methods={"POST"})
     */
    public function delete(Request $request, Exame $exame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exame->getExameId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($exame);
            $entityManager->flush();
        }

        return $this->redirectToRoute('exame_index');
    }
}
