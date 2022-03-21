<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Kontact;
use App\Entity\Products;
use App\Form\SearchType;
use App\Form\ContactType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\From;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductsController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;

    }

    #[Route('/nos-biens', name: 'products')]
    public function index(ManagerRegistry $manager, Request $request, MailerInterface $mailer ): Response
    {
        if(isset( $request->request->all()["contact"])){

        $contact = New Kontact();
        $form = $this->createForm(ContactType::class, $contact);  
        $form->handleRequest($request);
        try {
            $em = $manager->getManager();
            $em->persist($contact);
            $em->flush();
        } catch (\Exception $e) {
            $this->addFlash('danger', $e->getMessage());
        }
        
        $firstname = $request->request->all()["contact"]['firstname'];
        $lastname = $request->request->all()["contact"]['lastname'];
        $email = $request->request->all()["contact"]['email'];
        $telephone= $request->request->all()["contact"]["phone"];
        $date = $request->request->all()["contact"]["date"];
        $message = $request->request->all()["contact"]["message"];
        
        $email = (new Email())
        ->from($email)
        ->to('agencyParis1@gmail.com')
        ->subject('nouveau rdv'.$lastname)
        ->text('Vous avez rendez-vous le '. $date .'avec le client'. $lastname);

        $mailer->send($email);
        $this->addFlash('success', 'votre email a bien été envoyé');
        }
       
        //$products = $this->entityManager->getRepository(Products::class)->findAll();

        //$search = new Search();
        $form = $this->createForm(SearchType::class);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
           //dump($form->get('piecemin')->getData());
           $array = [
            'surfacemin'=> $form->get('surfacemin')->getData(),
            'surfacemax'=> $form->get('surfacemax')->getData(),
            'piecemin'=> $form->get('piecemin')->getData(),
            'piecemax'=> $form->get('piecemax')->getData(),
            'prixmax'=>  $form->get('prixmax')->getData(),
            'prixmin' => $form->get('prixmin')->getData()];
          // die();
            
            $products = $this->entityManager->getRepository(Products::class)->findSearch($array);

        }else{

            $products = $this->entityManager->getRepository(Products::class)->findAll();
        }

        return $this->render('products/index.html.twig', [
            'products'=> $products,
            'form' => $form->createView()
        ]);   
    
    }

    #[Route('/bien/{slug}', name: 'product')]
    public function show($slug, Request $request): Response
    {
       
        $product = $this->entityManager->getRepository(Products::class)->findOneBySlug($slug);
        
        $contact = New Kontact();

        $contact->setProduct($product);

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form ->isValid()){
            $this->addFlash('success', 'votre email a bien été envoyé');
            return $this->entityManager->getRepository(Products::class)->findOneBySlug($slug);      
        };


        if(!$product) 

        {
            return $this->redirectToRoute('products');
        }

        return $this->render('products/show.html.twig', [
            'product'=> $product,
            'form'=> $form->createView()
        ]);   
    
    }

}
