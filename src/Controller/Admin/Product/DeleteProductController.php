<?php 

namespace App\Controller\Admin\Product;

use App\MesServices\ImageServices\ImageService;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteProductController extends AbstractController
{
    /**
     * @Route("admin/product/delete/{id}", name="delete_product")
     */
    public function delete(int $id,ProduitRepository $productRepository,
                            EntityManagerInterface $em) : RedirectResponse
    {
        $product = $productRepository->find($id);
        
        if(!$product)
        {
            //$this->addFlash('danger','Ce produit n\'existe pas en bdd.');
            return $this->redirectToRoute('list_product');
        }

        //Processus de supression de l'image précédente
        //$imageService->deleteImage($product->getImageUrl());
    

        $em->remove($product);

        $em->flush();

        //$this->addFlash('success','Ce produit a bien été supprimé.');
        return $this->redirectToRoute('list_product');
    }
}