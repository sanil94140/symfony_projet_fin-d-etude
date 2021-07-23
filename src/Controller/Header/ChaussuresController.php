<?php

Namespace App\Controller\Header;

use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ChaussuresController extends AbstractController
{
    /**
     * @Route("/chaussure", name="category_chaussure")
     */
    public function home(ProduitRepository $produitRepository): Response
    {

        $chaussures=$produitRepository->findByCategorie(1);
        $conversion = 100;

        return $this->render("/header/chaussure.html.twig", [
            'chaussures'=>$chaussures,
            'conversion'=>$conversion
        ]);
    }
}