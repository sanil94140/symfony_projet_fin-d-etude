<?php 

namespace App\Controller\Admin\Product;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateProductController extends AbstractController
{
    /**
     * @Route("admin/produit/creer", name="create_product")
     */
    public function create(EntityManagerInterface $em, Request $request) : Response
    {
        $form = $this->createForm(ProduitType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            ///** @var Product $product */
            //$product = $form->getData();

            //$image = $form->get('imageUrl')->getData();

            //$imageService->save($image,$product);
            $product=new Produit();
            $product->setTitre($form->getViewData()->getTitre())
                    ->setImage($form->getViewData()->getImage())
                    ->setDescription($form->getViewData()->getDescription())
                    ->setPoids($form->getViewData()->getPoids())
                    ->setTailleVetement($form->getViewData()->getTailleVetement())
                    ->setPrix($form->getViewData()->getPrix())
                    ->setSexe($form->getViewData()->getSexe())
                    ->setCategorie($form->getViewData()->getCategorie())
            
            ;

            $em->persist($product);

            $em->flush();

            //$this->addFlash('success','Le produit a été créé.');

            return $this->redirectToRoute('list_product');
        }

        
        return $this->render('admin/product/create_product.html.twig', [
            'formProduct' => $form->createView()
        ]);
    }


    /**
     * @Route("/duplicate/{id}", name="duplicate_product")
     */
    public function duplicate(int $id, ProduitRepository $produitRepository, EntityManagerInterface $em)
    {
        $produit= new Produit();

        $produit2= $produitRepository->find($id);
        
        $produit->setTitre($produit2->getTitre())
        ->setImage($produit2->getImage())
        ->setDescription($produit2->getDescription())
        ->setPoids($produit2->getPoids())
        ->setTailleVetement($produit2->getTailleVetement())
        ->setPrix($produit2->getPrix())
        ->setSexe($produit2->getSexe())
        ->setCategorie($produit2->getCategorie());      
        
        $em->persist($produit);
        $em->flush();

        return $this->redirectToRoute('list_product'); 
    }
}