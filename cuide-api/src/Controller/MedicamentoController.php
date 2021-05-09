<?php

namespace App\Controller;

use App\Entity\Medicamento;
use App\Form\MedicamentoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * @Route("/medicamento")
 */
class MedicamentoController extends AbstractController
{
    /**
     * @Route("/", name="medicamento_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $medicamentos = $this->getDoctrine()
            ->getRepository(Medicamento::class)
            ->findAll();
        $arrayMedicamentos = [];

        foreach ($medicamentos as $m){
            array_push($arrayMedicamentos, $m->toArray());
        }

        return new JsonResponse($arrayMedicamentos, Response::HTTP_OK);
    }

    /**
     * @Route("/new", name="medicamento_new", methods={"POST"})
     */
    public function new(Request $request): JsonResponse
    {
        $data = json_decode($request->query->get('medicamento'), true);
        $medicamento = new Medicamento();

        $medicamento->setNome($data['nome']);
        $medicamento->setUsuarioIdusuario($data['idusuario']);
        $medicamento->setIdosoIdoso($data['ididoso']);
        $medicamento->setDataInicio($data['data_inicio']);
        $medicamento->setDataFim($data['data_fim']);
        $medicamento->setDosagem($data['dosagem']);
        $medicamento->setHorario($data['horario']);
        $medicamento->setQuantidade($data['quantidade']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($medicamento);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Medicamento cadastrado!'], Response::HTTP_OK);
    }

    /**
     * @Route("/{medicamentoId}", name="medicamento_show", methods={"GET"})
     */
    public function show(Medicamento $medicamento): Response
    {
        return new JsonResponse($medicamento->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{medicamentoId}/edit", name="medicamento_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medicamento $medicamento): Response
    {
        $data = json_decode($request->query->get('medicamento'), true);

        $medicamento->setNome($data['nome']);
        $medicamento->setUsuarioIdusuario($data['idusuario']);
        $medicamento->setIdosoIdoso($data['ididoso']);
        $medicamento->setDataInicio($data['data_inicio']);
        $medicamento->setDataFim($data['data_fim']);
        $medicamento->setDosagem($data['dosagem']);
        $medicamento->setHorario($data['horario']);
        $medicamento->setQuantidade($data['quantidade']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($medicamento);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Medicamento atualizado!'], Response::HTTP_OK);
    }

    /**
     * @Route("/{medicamentoId}/{hash}", name="medicamento_delete", methods={"POST"})
     */
    public function delete(Medicamento $medicamento, $hash): Response
    {
        if(sha1(md5($medicamento->getMedicamentoId().$medicamento->getNome())) === $hash){
            $this->getDoctrine()->getManager()->remove($medicamento);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(['status' => 'Item excluido!'], Response::HTTP_OK);
        }
        return new JsonResponse(['status' => 'Codigo inválido!'], Response::HTTP_UNAUTHORIZED);
    }
}
