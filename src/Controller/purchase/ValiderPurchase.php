<?php

namespace App\Controller\purchase;

use DateTime;
use App\Entity\Commande;
use App\Entity\Utilisateur;
use App\Entity\LigneDeCommande;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ValiderPurchase extends AbstractController
{
    /**
     * @Route("/commande", name="valider_purchase")
     */
    public function valider(UtilisateurRepository $user, ProduitRepository $produitRepository, CategorieRepository $categorie,
                            SessionInterface $session, 
                            MailerInterface $mailer, 
                            EntityManagerInterface $em):Response
    {

        /** @var Utilisateur $user */
        $user = $this->getUser();

        $alert=null;
        if(!$user){
            $alert=1;
            return $this->redirectToRoute('app_login');
        }

        $commande=new Commande();
        $commande->setUtilisateur($user);
        $commande->setCreatedAt(new \DateTime());
        $commande->setStatut("Commande validée");
        $em->persist($commande);
        $em->flush();

        $panier=$session->get('panier', []);
        $lignesDeCommandeArray=[];
        $totalArticle=0;
        $totalPrix=0;

        foreach($session->get('panier') as $id=>$quantite)
        {
            $ligneDeCommande= new LigneDeCommande();
            $ligneDeCommande->setProduit($produitRepository->find($id));
            $ligneDeCommande->setQuantite($quantite);
            $ligneDeCommande->setCommande($commande);
            $em->persist($ligneDeCommande);
            $em->flush();
            $lignesDeCommandeArray[]=$ligneDeCommande;
            $totalArticle+=intval($quantite);
            $totalPrix+= 
            floatval($ligneDeCommande->getProduit()->getPrix())*intval($quantite);
        }


        $panier=$session->clear('panier', []);

        $email=(new TemplatedEmail())
                ->from('sanil@sport-a-la-maison.com')
                ->to($user->getEmail())
                ->subject('Merci pour votre confiance!')
                ->htmlTemplate('email/validation.html.twig')
                ->context([
                    'user'=>$user,
                    'lignesDeCommandeArray'=>$lignesDeCommandeArray,
                    'totalArticle'=>$totalArticle,
                    'totalPrix'=>$totalPrix
                ]);
        $mailer->send($email);
        return $this->redirectToRoute('cart');
    }
}