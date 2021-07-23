<?php

Namespace App\Controller\Header;

use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class EquipementsController extends AbstractController
{
    /**
     * @Route("/equipement", name="category_equipement")
     */
    public function home(ProduitRepository $produitRepository): Response
    {

        $equipements=$produitRepository->findByCategorie(4);

        return $this->render("/header/equipement.html.twig", [
            'equipements'=>$equipements
        ]);
    }
}