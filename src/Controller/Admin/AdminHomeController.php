<?php

namespace App\Controller\Admin;

use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminHomeController extends AbstractController
{

    /**
     * @Route("/admin", name="admin_home")
     */    
    public function AdminHome():Response
    {

        return $this->render('admin/home_admin.html.twig');
    }
    
    /**
     * @Route("/admin/edit/{id}", name="admin_home_edit")
     */    
    public function AdminHomeEdit($id,Request $request,EntityManagerInterface $em, UtilisateurRepository $utilisateurRepository):Response
    {
        $utilisateur= $utilisateurRepository->find($id);

        if(!$utilisateur)
        {
            //$this->addFlash('danger','Ce produit n\'existe pas !');
            return $this->redirectToRoute('public_home');
        }

        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $nom=$form->get('nom')->getData();
            $prenom=$form->get('prenom')->getData();
            $pseudo=$form->get('pseudo')->getData();
            $email=$form->get('email')->getData();
            $sexe=$form->get('sexe')->getData();
            $numeroDeLaRue=$form->get('numeroDeLaRue')->getData();
            $nomDeLaRue=$form->get('nomDeLaRue')->getData();
            $ville=$form->get('ville')->getData();
            $codePostal=$form->get('codePostal')->getData();
            $pays=$form->get('pays')->getData();                            
            
            //$image = $form->get('imageUrl')->getData();

            //$imageService->edit($image,$product,$imageOriginal);

            $utilisateur->setNom($nom)
                    ->setPrenom($prenom)
                    ->setPseudo($pseudo)
                    ->setEmail($email)
                    ->setSexe($sexe)
                    ->setNumeroDeLaRue($numeroDeLaRue)
                    ->setNomDeLaRue($nomDeLaRue)
                    ->setVille($ville)
                    ->setCodePostal($codePostal)
                    ->setPays($pays);

            $em->flush();

            //$this->addFlash('success','Le produit ' . $product->getName() . ' a bien été modifié.');
            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin/utilisateur/edit_utilisateur.html.twig',[
            'formUtilisateur' => $form->createView(), 'utilisateur'=>$utilisateur
        ]);

    }



}