<?php

Namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PageProduitController extends AbstractController
{
    /**
     * @Route("/produit/{id}", name="produit")
     */
    public function show(ProduitRepository $produitRepository, int $id) : Response
    {
        $product= $produitRepository->find($id);
        return $this->render("produit/page_produit.html.twig", [
            'product'=>$product
        ]);
    }
}