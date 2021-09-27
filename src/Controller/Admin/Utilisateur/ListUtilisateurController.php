<?php 

namespace App\Controller\Admin\Utilisateur;

use App\Repository\UtilisateurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ListProductController extends AbstractController 
{


    /**
     * @Route("admin/product/list" , name="list_utilisateur")
     */
    public function list(UtilisateurRepository $utilisateurRepository, Request $request,
                        PaginatorInterface $paginatorInterface) : Response
    {


        $data = $produitRepository->findAll();

        $produits = $paginatorInterface->paginate(
            $data,
            $request->query->getInt('page',1),
            5
        );

        return $this->render("admin/utilisateur/list_utilisateur.html.twig",[
            'produits' => $produits
        ]);
    }


}