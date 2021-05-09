<?php

namespace App\Controller;

use App\Entity\Cuidador;
use App\Form\CuidadorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function index(): JsonResponse
    {
        $cuidadores = $this->getDoctrine()
            ->getRepository(Cuidador::class)
            ->findAll();
        $arrayCuidadores = [];
        foreach ($cuidadores as $c){
            array_push($arrayCuidadores, $c->toArray());
        }
        return new JsonResponse($arrayCuidadores, Response::HTTP_OK);
    }

    /**
     * @Route("/new", name="cuidador_new", methods={"POST"})
     */
    public function new(Request $request): JsonResponse
    {
        $data = json_decode($request->query->get('cuidador'), true);

        $cuidador = new Cuidador();
        $cuidador->setDataNascimento($data['data_nascimento']);
        $cuidador->setUsuarioIdusuario($data['idusuario']);
        $cuidador->setCertificacao($data['certificacao']);
        $cuidador->setCpf($data['cpf']);
        $cuidador->setEmail($data['email']);
        $cuidador->setFoto($data['foto']);
        $cuidador->setNome($data['nome']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cuidador);
        $entityManager->flush();

//        return $this->json([]);
        return new JsonResponse(['status' => 'Cuidador cadastrado!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{cuidadorId}", name="cuidador_show", methods={"GET"})
     * @param Cuidador $cuidador
     * @return JsonResponse
     */
    public function show(Cuidador $cuidador): JsonResponse
    {
        return new JsonResponse($cuidador->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{cuidadorId}/edit", name="cuidador_edit", methods={"PUT"})
     * @param Request $request
     * @param Cuidador $cuidador
     * @return Response
     */
    public function edit(Request $request, Cuidador $cuidador): Response
    {
        $data = json_decode($request->query->get('cuidador'), true);

        $cuidador->setDataNascimento($data['data_nascimento']);
        $cuidador->setUsuarioIdusuario($data['idusuario']);
        $cuidador->setCertificacao($data['certificacao']);
        $cuidador->setCpf($data['cpf']);
        $cuidador->setEmail($data['email']);
        $cuidador->setFoto($data['foto']);
        $cuidador->setNome($data['nome']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cuidador);
        $entityManager->flush();

//        return $this->json([]);
        return new JsonResponse(['status' => 'Cuidador atualizado!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{cuidadorId}/{hash}", name="cuidador_delete", methods={"DELETE"})
     * @param Cuidador $cuidador
     * @param $hash
     * @return JsonResponse
     */
    public function delete(Cuidador $cuidador, $hash): JsonResponse
    {
        if(sha1(md5($cuidador->getCuidadorId().$cuidador->getNome())) === $hash){
            $this->getDoctrine()->getManager()->remove($cuidador);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(['status' => 'Item excluido!'], Response::HTTP_OK);
        }
        return new JsonResponse(['status' => 'Codigo inválido!'], Response::HTTP_UNAUTHORIZED);
    }
}
