<?php

namespace App\Controller;

use App\Entity\Cuidador;
use App\Form\CuidadorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cuidador")
 */
class CuidadorController extends AbstractController
{
    /**
     * @Route("/", name="cuidador_index", methods={"GET"})
     */
    public function index(): Response
    {
        $cuidadors = $this->getDoctrine()
            ->getRepository(Cuidador::class)
            ->findAll();

        return $this->render('cuidador/index.html.twig', [
            'cuidadors' => $cuidadors,
        ]);
    }

    /**
     * @Route("/new", name="cuidador_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cuidador = new Cuidador();
        $form = $this->createForm(CuidadorType::class, $cuidador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cuidador);
            $entityManager->flush();

            return $this->redirectToRoute('cuidador_index');
        }

        return $this->render('cuidador/new.html.twig', [
            'cuidador' => $cuidador,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{cuidadorId}", name="cuidador_show", methods={"GET"})
     */
    public function show(Cuidador $cuidador): Response
    {
        return $this->render('cuidador/show.html.twig', [
            'cuidador' => $cuidador,
        ]);
    }

    /**
     * @Route("/{cuidadorId}/edit", name="cuidador_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cuidador $cuidador): Response
    {
        $form = $this->createForm(CuidadorType::class, $cuidador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cuidador_index');
        }

        return $this->render('cuidador/edit.html.twig', [
            'cuidador' => $cuidador,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{cuidadorId}", name="cuidador_delete", methods={"POST"})
     */
    public function delete(Request $request, Cuidador $cuidador): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cuidador->getCuidadorId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cuidador);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cuidador_index');
    }
}
