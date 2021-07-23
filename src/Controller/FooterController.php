<?php

Namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FooterController extends AbstractController
{
    /**
     * @Route("/contact", name="public_contact")
     */
    public function contact(): Response
    {
        return $this->render("footer/contact.html.twig");
    }

    /**
     * @Route("/cgv", name="public_cgv")
     */
    public function cgv(): Response
    {
        return $this->render("footer/cgv.html.twig");
    }

    /**
     * @Route("/faq", name="public_faq")
     */
    public function faq(): Response
    {
        return $this->render("footer/FAQ.html.twig");
    }
}