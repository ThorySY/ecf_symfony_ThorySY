<?php

namespace App\Controller;

use App\Entity\Products;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $manager): Response
    {
        
        $products=$manager->getRepository(Products::class)->findAll();
        return $this->render('home/index.html.twig', [
            'products'=>$products
            
        ]);
    }
}
