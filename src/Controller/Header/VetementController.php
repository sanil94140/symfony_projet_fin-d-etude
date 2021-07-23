<?php

Namespace App\Controller\Header;

use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class VetementController extends AbstractController
{
    /**
     * @Route("/vetement", name="category_vetement")
     */
    public function home(ProduitRepository $produitRepository): Response
    {

        $vetement=$produitRepository->findByCategorie(3);

        return $this->render("/header/vetement.html.twig", [
            'vetements'=>$vetement
        ]);
    }
}