<?php 

namespace App\Controller\Admin\Product;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListProductController extends AbstractController 
{


    /**
     * @Route("admin/product/list" , name="list_product")
     */
    public function list(ProduitRepository $produitRepository, Request $request,
                        PaginatorInterface $paginatorInterface) : Response
    {


        $data = $produitRepository->findAll();

        $produits = $paginatorInterface->paginate(
            $data,
            $request->query->getInt('page',1),
            5
        );

        return $this->render("admin/product/list_product.html.twig",[
            'produits' => $produits
        ]);
    }


}