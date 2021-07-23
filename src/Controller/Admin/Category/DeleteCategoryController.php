<?php 

namespace App\Controller\Admin\Category;

use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteCategoryController extends AbstractController
{
    /**
     * @Route("admin/category/delete/{id}", name="delete_category")
     */
    public function delete(int $id,CategorieRepository $categoryRepository,
                            EntityManagerInterface $em) : RedirectResponse
    {
        $category = $categoryRepository->find($id);
        
        if(!$category)
        {
            //$this->addFlash('danger','Cette catégorie n\'existe pas en bdd.');
            return $this->redirectToRoute('list_category');
        }

        //$imageService->deleteImage($category->getImageUrl());

        $em->remove($category);

        $em->flush();

        //$this->addFlash('success','Cette catégorie a bien été supprimée.');
        return $this->redirectToRoute('list_category');
    }
}