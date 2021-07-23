<?php 

namespace App\Controller\Admin\Category;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListCategoryController extends AbstractController
{
    /**
     * @Route("admin/categorie/liste", name="list_category")
     */
    public function list(CategorieRepository $categorieRepository) : Response
    {
        $categories = $categorieRepository->findAll();

        return $this->render('admin/category/list_category.html.twig',[
            'categories' =>  $categories
        ]);
    }
}