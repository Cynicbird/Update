<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="registration")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\Form\Exception\LogicException
     */
    public function registerAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $password = $this
                ->get('security.password_encoder')
                ->encodePassword(
                    $user,
                    $user->getPlainPassword()
                )
            ;
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'You are now successfully registered.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/register.html.twig', [
            'registration_form' => $form->createView(),
        ]);
    }
}