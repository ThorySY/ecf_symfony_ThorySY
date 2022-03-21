<?php

namespace App\Controller\Admin;

use App\Entity\Agents;
use App\Entity\Images;
use App\Entity\Kontact;
use App\Entity\Products;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Agency');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        if($this->getUser() && $this->isGranted('ROLE_ADMIN', 'ROLE_SUPER_ADMIN')){
        yield MenuItem::linkToCrud('Mail','fa fa-envelope', Kontact::class);
        yield MenuItem::linkToCrud('Photo','fa fa-images', Images::class);
        yield MenuItem::linkToCrud('Biens immobiliers', 'fa fa-bed', Products::class);
        }
        if($this->getUser() && $this->isGranted('ROLE_SUPER_ADMIN')){
            yield MenuItem::linkToCrud('Agents', 'fa fa-user', Agents::class);
          
        }
    }
}
