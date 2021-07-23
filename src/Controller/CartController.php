<?php

namespace App\Controller;

use App\Entity\LigneDeCommande;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(SessionInterface $session, ProduitRepository $product): Response
    {
        $panier=$session->get('panier', []);

        $panierWithData=[];

        foreach($panier as $id=>$quantity){
            if($product->find($id)!==null){
                $panierWithData[]=[
                    'product'=> $product->find($id),
                    'quantity'=>$quantity
                ];
            }
        }

        $total=0;

        foreach($panierWithData as $item){
            $totalItem=$item['product']->getPrix()*$item['quantity'];
            $total+=$totalItem;
        }

        return $this->render('cart/index.html.twig', [
            'items'=>$panierWithData,
            'total'=>$total
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {
        $panier=$session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id]=1;
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute("cart");
    }

    /**
     * @Route("/cart/minus/{id}", name="cart_minus")
     */
    public function minus($id, SessionInterface $session)
    {
        $panier=$session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id]--;
        }else{
            $panier[$id]=1;
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute("cart");
    }


    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session){
        $panier=$session->get('panier', []);

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }

        $session->set('panier', $panier);
        return $this->redirectToRoute("cart");
    }

    /**
     * @Route("/session", name="session_result")
     */
    public function session( SessionInterface $session)
    {
        dd($session->get('panier'));
    }

    

}
