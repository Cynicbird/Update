<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    
  
}
