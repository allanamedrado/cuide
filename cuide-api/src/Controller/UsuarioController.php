<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/usuario")
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/", name="usuario_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $usuarios = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findAll();

        $arrayUsuarios = [];

        foreach ($usuarios as $u){
            array_push($arrayUsuarios, $u->toArray());
        }

        return new JsonResponse($arrayUsuarios, Response::HTTP_OK);
    }

    /**
     * @Route("/new", name="usuario_new", methods={"POST"})
     */
    public function new(Request $request): JsonResponse
    {
        $data = json_decode($request->query->get('usuario'), true);
        $usuario = new Usuario();

        $usuario->setUsuario($data['usuario']);
        $usuario->setSenha(sha1(md5($data['senha'])));
        $usuario->setCategoria($data['categoria']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($usuario);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Usuario criado'], Response::HTTP_OK);
    }

    /**
     * @Route("/{idusuario}", name="usuario_show", methods={"GET"})
     */
    public function show(Usuario $usuario): JsonResponse
    {
        return new JsonResponse($usuario->toArray(), Response::HTTP_OK);
    }

    /**
     * @Route("/{idusuario}/edit", name="usuario_edit", methods={"PUT"})
     */
    public function edit(Request $request, Usuario $usuario): Response
    {
        $data = json_decode($request->query->get('usuario'), true);

        $usuario->setUsuario($data['usuario']);
        $usuario->setSenha(sha1(md5($data['senha'])));
        $usuario->setCategoria($data['categoria']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($usuario);
        $entityManager->flush();

        return new JsonResponse(['status' => 'Usuario atualizado'], Response::HTTP_OK);
    }
    /**
     * @Route("/{usuario}/getuser", name="get_user", methods={"GET"})
     */
    public function getUserWithUsername(Request $request, $usuario): JsonResponse
    {
        $usuario = $this->getDoctrine()->getManager()->getRepository(Usuario::class)
            ->findOneBy(['usuario' => $usuario]);

        return new JsonResponse(['idusuario' => $usuario->getIdusuario(), 'categoria' => $usuario->getCategoria()], Response::HTTP_OK);

    }
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request): JsonResponse
    {
        $data = json_decode($request->query->get('login'), true);

        $usuario = $this->getDoctrine()->getManager()->getRepository(Usuario::class)
            ->findOneBy(['usuario' => $data['usuario']]);

        if(!$usuario){
            return new JsonResponse(['status' => 'Usuario ou senha inválidos!'], Response::HTTP_BAD_REQUEST);
        }
        if($usuario->getSenha() === sha1(md5($data['senha']))){
            $request->getSession()->set('usuario', $usuario->getUsuario());
            $request->getSession()->set('categoria', $usuario->getCategoria());
            return new JsonResponse(['status' => 'Login efetuado'], Response::HTTP_ACCEPTED);
        }

        return new JsonResponse(['status' => 'Usuario ou senha inválidos'], Response::HTTP_BAD_REQUEST);

    }

    /**
     * @Route("/api/logout", name="logout", methods={"GET"})
     */
    public function logout(Request $request): JsonResponse
    {

        $request->getSession()->remove('usuario');
        $request->getSession()->remove('categoria');

        return new JsonResponse(['status' => 'Logout efetuado'], Response::HTTP_OK);

    }

    /**
     * @Route("/get/session", name="getsession", methods={"GET"})
     */
    public function getSession(Request $request): JsonResponse
    {
        
        return new JsonResponse(
            [
                'usuario' => $request->getSession()->get('usuario'),
                'categoria' => $request->getSession()->get('categoria')
            ],Response::HTTP_OK);

    }

//    /**
//     * @Route("/{idusuario}", name="usuario_delete", methods={"POST"})
//     */
//    public function delete(Request $request, Usuario $usuario): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$usuario->getIdusuario(), $request->request->get('_token'))) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->remove($usuario);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('usuario_index');
//    }
}
