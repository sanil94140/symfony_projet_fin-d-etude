<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminHomeController extends AbstractController
{

    /**
     * @Route("/admin", name="admin_home")
     */    
    public function AdminHome():Response
    {

        return $this->render('admin/home_admin.html.twig');
    }

}