<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\user;


class UsuarioController extends Controller
{
    public function usuarioAction($name)
    {
        return new Response('Hola usuario ' . $name);
    }
    public function indexAction()
    {
        $em = $this -> getDoctrine()->getManager();
        $user = $em-> getRepository('UserBundle:user')->findAll();
        
        return $this->render('UserBundle:User:index.html.twig', array('users'=>$user));
    }
    public function addAction()
    {
        $user = new User();
        $user->setUsername('Carlos D');
        $user->setCedula('V-19110720');
        $user->setPassword('19901020');

        $user->setRole('Usuario');

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
    }
    public function editAction($id)
    {
        return new Response('Hola usuario ' . $id);
    }
    public function viewAction($id)
    {
        $repository= $this->getDoctrine()->getRepository('UserBundle:user');
        $user= $repository->findOneById($id);
        // $user= $repository->findOneById($id);
                    // o
        // $user= $repository->find($id);
        // if(null != $user)
        //     return new Response('Usuario' . $user->getUsername());
        // else {
        //     return new Response('No encontro el usuario');
        // }
    }
    public function deleteAction($id)
    {

    }
}
