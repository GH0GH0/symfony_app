<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController {

    /**
     * @Route("/user")
     */
    
    function createUserForm(Request $request){
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $userInfos = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userInfos);
            return new Response("Formulaire validé .");
        }

        return $this->render('form.html.twig', ['userForm' => $form->createView()] );
    }

    

}