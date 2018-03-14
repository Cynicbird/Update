<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecureController extends Controller
{
    /**
     * @Route("/secure", name="secure")
     */
    public function index()
    {
        return $this->render('secure/index.html.twig', [
            'controller_name' => 'SecureController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(){
        return $this->render('users/security/login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(){
        return $this->render('base.html.twig');
    }
}
