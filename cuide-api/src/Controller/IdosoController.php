<?php

namespace App\Controller;

use App\Entity\Idoso;
use App\Form\IdosoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * @Route("/idoso")
 */
class IdosoController extends AbstractController
{
    /**
     * @Route("/", name="idoso_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $idosos = $this->getDoctrine()
            ->getRepository(Idoso::class)
            ->findAll();

        $arrayIdosos = [];
        foreach ($idosos as $i){
            array_push($arrayIdosos, $i->toArray());
        }
        return new JsonResponse($arrayIdosos, Response::HTTP_OK);

    }

    /**
     * @Route("/new", name="idoso_new", methods={"POST"})
     */
    public function new(Request $request): JsonResponse
    {
        $data = json_decode($request->query->get('idoso'), true);
        $idoso = new Idoso();

        $idoso->setUsuarioIdusuario($data['idusuario']);
        $idoso->setNome($data['nome']);
        $idoso->setEmail($data['email']);
        $idoso->setCpf($data['cpf']);
        $idoso->setDataNascimento($data['data_nascimento']);
        $idoso->setCuidadorCuidador($data['idcuidador']);
        $idoso->setEndereco($data['endereco']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($idoso);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Idoso cadastrado!'], Response::HTTP_OK);

    }

    /**
     * @Route("/{idosoId}", name="idoso_show", methods={"GET"})
     */
    public function show(Idoso $idoso): Response
    {
        return new JsonResponse($idoso->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{idosoId}/edit", name="idoso_edit", methods={"PUT"})
     */
    public function edit(Request $request, Idoso $idoso): Response
    {
        $data = json_decode($request->query->get('idoso'), true);

        $idoso->setUsuarioIdusuario($data['idusuario']);
        $idoso->setNome($data['nome']);
        $idoso->setEmail($data['email']);
        $idoso->setCpf($data['cpf']);
        $idoso->setDataNascimento($data['data_nascimento']);
        $idoso->setCuidadorCuidador($data['idcuidador']);
        $idoso->setEndereco($data['endereco']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($idoso);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Idoso atualizado!'], Response::HTTP_OK);
    }

    /**
     * @Route("/{idosoId}/{hash}", name="idoso_delete", methods={"POST"})
     */
    public function delete(Idoso $idoso, $hash): Response
    {
        if(sha1(md5($idoso->getIdosoId().$idoso->getNome())) === $hash){
            $this->getDoctrine()->getManager()->remove($idoso);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(['status' => 'Item excluido!'], Response::HTTP_OK);
        }
        return new JsonResponse(['status' => 'Codigo inválido!'], Response::HTTP_UNAUTHORIZED);
    }
}
