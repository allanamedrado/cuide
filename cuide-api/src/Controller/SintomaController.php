<?php

namespace App\Controller;

use App\Entity\Sintoma;
use App\Form\SintomaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * @Route("/sintoma")
 */
class SintomaController extends AbstractController
{
    /**
     * @Route("/", name="sintoma_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $sintomas = $this->getDoctrine()
            ->getRepository(Sintoma::class)
            ->findAll();
        $arraySintomas = [];
        foreach ($sintomas as $s){
            array_push($arraySintomas, $s->toArray());
        }

        return new JsonResponse($arraySintomas, Response::HTTP_OK);
    }

    /**
     * @Route("/new", name="sintoma_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data = json_decode($request->query->get('sintoma'), true);
        $sintoma = new Sintoma();

        $sintoma->setIdosoIdoso($data['ididoso']);
        $sintoma->setUsuarioIdusuario($data['idusuario']);
        $sintoma->setAlteracoes($data['alteracoes']);
        $sintoma->setLocalAlteracoes($data['local_alteracoes']);
        $sintoma->setLocalDores($data['local_dores']);
        $sintoma->setObservacoes($data['observacoes']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($sintoma);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Sintoma cadastrado'], Response::HTTP_OK);
    }

    /**
     * @Route("/{sintomaId}", name="sintoma_show", methods={"GET"})
     */
    public function show(Sintoma $sintoma): Response
    {
        return new JsonResponse($sintoma->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{sintomaId}/edit", name="sintoma_edit", methods={"PUT"})
     */
    public function edit(Request $request, Sintoma $sintoma): Response
    {
        $data = json_decode($request->query->get('sintoma'), true);

        $sintoma->setIdosoIdoso($data['ididoso']);
        $sintoma->setUsuarioIdusuario($data['idusuario']);
        $sintoma->setAlteracoes($data['alteracoes']);
        $sintoma->setLocalAlteracoes($data['local_alteracoes']);
        $sintoma->setLocalDores($data['local_dores']);
        $sintoma->setObservacoes($data['observacoes']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($sintoma);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Sintoma cadastrado'], Response::HTTP_OK);
    }

    /**
     * @Route("/{sintomaId}/{hash}", name="sintoma_delete", methods={"POST"})
     */
    public function delete(Sintoma $sintoma, $hash): Response
    {
        if(sha1(md5($sintoma->getSintomaId())) === $hash){
            $this->getDoctrine()->getManager()->remove($sintoma);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(['status' => 'Item excluido!'], Response::HTTP_OK);
        }
        return new JsonResponse(['status' => 'Codigo inválido!'], Response::HTTP_UNAUTHORIZED);
    }
}
