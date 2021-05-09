<?php

namespace App\Controller;

use App\Entity\Exame;
use App\Form\ExameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * @Route("/exame")
 */
class ExameController extends AbstractController
{
    /**
     * @Route("/", name="exame_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $exames = $this->getDoctrine()
            ->getRepository(Exame::class)
            ->findAll();
        $arrayExames = [];
        foreach ($exames as $e){
            array_push($arrayExames, $e->toArray());
        }
        return new JsonResponse($arrayExames, Response::HTTP_OK);

    }

    /**
     * @Route("/new", name="exame_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $data = json_decode($request->query->get('exame'), true);
        $exame = new Exame();

        $exame->setNome($data['nome']);
        $exame->setUsuarioIdusuario($data['idusuario']);
        $exame->setIdosoIdoso($data['ididoso']);
        $exame->setLocal($data['local']);
        $exame->setData(data_create($data['data']));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($exame);
        $entityManager->flush();

        return new JsonResponse(['status' => 'exame marcado'], Response::HTTP_OK);

    }

    /**
     * @Route("/{exameId}", name="exame_show", methods={"GET"})
     */
    public function show(Exame $exame): Response
    {
        return new JsonResponse($exame->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{exameId}/edit", name="exame_edit", methods={"PUT"})
     */
    public function edit(Request $request, Exame $exame): Response
    {
        $data = json_decode($request->query->get('exame'), true);

        $exame->setNome($data['nome']);
        $exame->setUsuarioIdusuario($data['idusuario']);
        $exame->setIdosoIdoso($data['ididoso']);
        $exame->setLocal($data['local']);
        $exame->setData(data_create($data['data']));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($exame);
        $entityManager->flush();

        return new JsonResponse(['status' => 'exame atualizado'], Response::HTTP_OK);
    }

    /**
     * @Route("/{exameId}/{hash}", name="exame_delete", methods={"DELETE"})
     */
    public function delete(Exame $exame, $hash): Response
    {
        if(sha1(md5($exame->getExameId().$exame->getNome())) === $hash){
            $this->getDoctrine()->getManager()->remove($exame);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(['status' => 'Item excluido!'], Response::HTTP_OK);
        }
        return new JsonResponse(['status' => 'Codigo inválido!'], Response::HTTP_UNAUTHORIZED);
    }
}
