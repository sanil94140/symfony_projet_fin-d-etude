<?php

namespace App\Doctrine\Listener;

use App\Entity\Utilisateur;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class CreateUserListener
{
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer=$mailer;
    }

    public function prePersist(Utilisateur $entity)
    {
        $email=(new TemplatedEmail())
                ->from('sanil@sport-a-la-maison.com')
                ->to($entity->getEmail())
                ->subject('Merci pour votre inscription!')
                ->htmlTemplate('email/bienvenue.html.twig')
                ->context([
                    'user'=>$entity
                ]);
        return $this->mailer->send($email);
    }
}