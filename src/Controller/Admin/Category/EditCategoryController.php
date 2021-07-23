<?php 

namespace App\Controller\Admin\Category;

use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\MesServices\ImageServices\ImageService;
use App\MesServices\ImageServices\DeleteImageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditCategoryController extends AbstractController
{
    /**
     * @Route("admin/category/edit/{id}", name="edit_category")
     */
    public function edit($id,Request $request,EntityManagerInterface $em,
                        CategorieRepository $categoryRepository)
    {
        $category = $categoryRepository->find($id);

        if(!$category)
        {
            //$this->addFlash('danger','Cette catégorie n\'existe pas !');
            return $this->redirectToRoute('list_category');
        }

        //$imageOriginal = $category->getImageUrl();
        //$nomDeLaCategorie = $category->getNomDeLaCategorie();

        $form = $this->createForm(CategorieType::class, $category);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $nom=$form->get('nomDeLaCategorie')->getData();
            // $image = $form->get('imageUrl')->getData();

            //Je vérifie que l'image existe bel et bien.
            //$imageService->edit($image,$category, $imageOriginal);

            $category->setNomDeLaCategorie($nom);

            $em->flush();

            // $this->addFlash('success','La catégorie ' . $category->getName() . ' a bien été modifié.');
            return $this->redirectToRoute('list_category');
        }

        return $this->render('admin/category/edit_category.html.twig',[
            'formCategory' => $form->createView()
        ]);
    }
}