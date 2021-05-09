<?php

namespace App\Controller;

use App\Entity\Consulta;
use App\Form\ConsultaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consulta")
 */
class ConsultaController extends AbstractController
{
    /**
     * @Route("/", name="consulta_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $consultas = $this->getDoctrine()->getManager()
            ->getRepository(Consulta::class)
            ->findAll();
        $arrayConsultas = [];
        foreach ($consultas as $c){
            array_push($arrayConsultas, $c->toArray());
        }
        return new JsonResponse($arrayConsultas, Response::HTTP_OK);

    }

    /**
     * @Route("/new", name="consulta_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $data = json_decode($request->query->get('consulta'), true);

        $consulta = new Consulta();
        $consulta->setData(date_create($data['data']['date']));
        $consulta->setEspecialidade($data['especialidade']);
        $consulta->setHora($data['hora']);
        $consulta->setLocal($data['local']);
        $consulta->setMedico($data['medico']);
        $consulta->setIdosoIdoso($data['ididoso']);
        $consulta->setUsuarioIdusuario($data['idusuario']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($consulta);
        $entityManager->flush();

//        return $this->json([]);
        return new JsonResponse(['status' => 'Consulta criada!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{consultaId}", name="consulta_show", methods={"GET"})
     */
    public function show(Consulta $consulta): Response
    {
        return new JsonResponse($consulta->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{consultaId}", name="consulta_edit", methods={"PUT"})
     */
    public function edit(Request $request, Consulta $consulta): Response
    {
        $data = json_decode($request->query->get('consulta'), true);

        $consulta->setData(date_create($data['data']['date']));
        $consulta->setEspecialidade($data['especialidade']);
        $consulta->setHora($data['hora']);
        $consulta->setLocal($data['local']);
        $consulta->setMedico($data['medico']);
        $consulta->setIdosoIdoso($data['ididoso']);
        $consulta->setUsuarioIdusuario($data['idusuario']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($consulta);
        $entityManager->flush();

//        return $this->json([]);
        return new JsonResponse(['status' => 'Consulta Atualizada!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{consultaId}/{hash}", name="consulta_delete", methods={"DELETE"})
     */
    public function delete(Consulta $consulta, $hash): JsonResponse
    {
        if(sha1(md5($consulta->getConsultaId().$consulta->getLocal())) === $hash){
            $this->getDoctrine()->getManager()->remove($consulta);
            $this->getDoctrine()->getManager()->flush();
            return new JsonResponse(['status' => 'Item excluido!'], Response::HTTP_OK);
        }
        return new JsonResponse(['status' => 'Codigo inválido!'], Response::HTTP_UNAUTHORIZED);
    }
}
