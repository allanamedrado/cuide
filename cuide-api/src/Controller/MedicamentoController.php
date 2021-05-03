<?php

namespace App\Controller;

use App\Entity\Medicamento;
use App\Form\MedicamentoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medicamento")
 */
class MedicamentoController extends AbstractController
{
    /**
     * @Route("/", name="medicamento_index", methods={"GET"})
     */
    public function index(): Response
    {
        $medicamentos = $this->getDoctrine()
            ->getRepository(Medicamento::class)
            ->findAll();

        return $this->render('medicamento/index.html.twig', [
            'medicamentos' => $medicamentos,
        ]);
    }

    /**
     * @Route("/new", name="medicamento_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $medicamento = new Medicamento();
        $form = $this->createForm(MedicamentoType::class, $medicamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medicamento);
            $entityManager->flush();

            return $this->redirectToRoute('medicamento_index');
        }

        return $this->render('medicamento/new.html.twig', [
            'medicamento' => $medicamento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{medicamentoId}", name="medicamento_show", methods={"GET"})
     */
    public function show(Medicamento $medicamento): Response
    {
        return $this->render('medicamento/show.html.twig', [
            'medicamento' => $medicamento,
        ]);
    }

    /**
     * @Route("/{medicamentoId}/edit", name="medicamento_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medicamento $medicamento): Response
    {
        $form = $this->createForm(MedicamentoType::class, $medicamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medicamento_index');
        }

        return $this->render('medicamento/edit.html.twig', [
            'medicamento' => $medicamento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{medicamentoId}", name="medicamento_delete", methods={"POST"})
     */
    public function delete(Request $request, Medicamento $medicamento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicamento->getMedicamentoId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medicamento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medicamento_index');
    }
}
