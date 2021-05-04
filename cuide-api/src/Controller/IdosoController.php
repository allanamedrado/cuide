<?php

namespace App\Controller;

use App\Entity\Idoso;
use App\Form\IdosoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/idoso")
 */
class IdosoController extends AbstractController
{
    /**
     * @Route("/", name="idoso_index", methods={"GET"})
     */
    public function index(): Response
    {
        $idosos = $this->getDoctrine()
            ->getRepository(Idoso::class)
            ->findAll();

        return $this->render('idoso/index.html.twig', [
            'idosos' => $idosos,
        ]);
    }

    /**
     * @Route("/new", name="idoso_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $idoso = new Idoso();
        $form = $this->createForm(IdosoType::class, $idoso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($idoso);
            $entityManager->flush();

            return $this->redirectToRoute('idoso_index');
        }

        return $this->render('idoso/new.html.twig', [
            'idoso' => $idoso,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idosoId}", name="idoso_show", methods={"GET"})
     */
    public function show(Idoso $idoso): Response
    {
        return $this->render('idoso/show.html.twig', [
            'idoso' => $idoso,
        ]);
    }

    /**
     * @Route("/{idosoId}/edit", name="idoso_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Idoso $idoso): Response
    {
        $form = $this->createForm(IdosoType::class, $idoso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('idoso_index');
        }

        return $this->render('idoso/edit.html.twig', [
            'idoso' => $idoso,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idosoId}", name="idoso_delete", methods={"POST"})
     */
    public function delete(Request $request, Idoso $idoso): Response
    {
        if ($this->isCsrfTokenValid('delete'.$idoso->getIdosoId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($idoso);
            $entityManager->flush();
        }

        return $this->redirectToRoute('idoso_index');
    }
}
