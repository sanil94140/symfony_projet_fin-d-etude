<?php

Namespace App\Controller\Header;

use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AppareilsController extends AbstractController
{
    /**
     * @Route("/appareil", name="category_appareil")
     */
    public function home(ProduitRepository $produitRepository): Response
    {

        $appareils=$produitRepository->findByCategorie(2);

        return $this->render("/header/appareil.html.twig", [
            'appareils'=>$appareils
        ]);
    }
}