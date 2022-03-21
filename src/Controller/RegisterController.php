<?php

namespace App\Controller;

use App\Entity\Agents;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Command\UserPasswordHashCommand;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/inscription', name: 'register')]

    public function index(Request $request, UserPasswordHasherInterface $hasher): Response
    {
        $agent = new Agents();
        $form = $this->createForm(RegisterType::class, $agent);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $agent = $form->getData();

            $password = $hasher->hashPassword($agent, $agent->getPassword());

            $agent->setPassword($password);
            
            $this->entityManager->persist($agent);
            $this->entityManager->flush();
        }


        return $this->render('register/index.html.twig', [
            'form' => $form->createView()

        ]);
    }
}
