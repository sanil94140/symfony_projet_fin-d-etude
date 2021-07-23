<?php 

namespace App\Controller\Admin\Category;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateCategoryController extends AbstractController
{
    /**
     * @Route("admin/categorie/creer", name="create_category")
     */
    public function create(Request $request, EntityManagerInterface $em) : Response
    {

        $form = $this->createForm(CategorieType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $categorie=new Categorie();
            $categorie->setNomDeLaCategorie($form->getViewData()->getNomDeLaCategorie());

            $em->persist($categorie);

            $em->flush();

            // $this->addFlash('success','Votre catégorie ' . $category->getName() . ' a bien été créé.');
            return $this->redirectToRoute('list_category');
        }

        
        return $this->render('admin/category/create_category.html.twig',[
            'formCategory' => $form->createView()
        ]);
    }
}