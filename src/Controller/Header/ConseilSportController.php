<?php

Namespace App\Controller\Header;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ConseilSportController extends AbstractController
{
    /**
     * @Route("/conseil-sport", name="public_blog")
     */
    public function home(): Response
    {
        return $this->render("/header/conseilSport.html.twig");
    }
}