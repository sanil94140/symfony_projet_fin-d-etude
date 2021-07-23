<?php 

namespace App\Controller\Admin\Product;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditProductController extends AbstractController
{
    /**
     * @Route("admin/product/edit/{id}", name="edit_product")
     */
    public function edit($id,Request $request,EntityManagerInterface $em,
                        ProduitRepository $productRepository)
    {
        $product = $productRepository->find($id);

        if(!$product)
        {
            //$this->addFlash('danger','Ce produit n\'existe pas !');
            return $this->redirectToRoute('list_product');
        }

        //$imageOriginal = $product->getImageUrl();

        $form = $this->createForm(ProduitType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $titre=$form->get('titre')->getData();
            $image=$form->get('image')->getData();
            $description=$form->get('description')->getData();
            $poids=$form->get('poids')->getData();
            $tailleVetement=$form->get('tailleVetement')->getData();
            $prix=$form->get('prix')->getData();
            $categorie=$form->get('categorie')->getData();
                            
            
            //$image = $form->get('imageUrl')->getData();

            //$imageService->edit($image,$product,$imageOriginal);

            $product->setTitre($titre)
                    ->setImage($image)
                    ->setDescription($description)
                    ->setPoids($poids)
                    ->setTailleVetement($tailleVetement)
                    ->setPrix($prix)
                    ->setCategorie($categorie);

            $em->flush();

            //$this->addFlash('success','Le produit ' . $product->getName() . ' a bien été modifié.');
            return $this->redirectToRoute('list_product');
        }

        return $this->render('admin/product/edit_product.html.twig',[
            'formProduct' => $form->createView()
        ]);
    }
}