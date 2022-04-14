<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('alajitest1@pawolanmwen.com')
            ->to('alajitest4@pawolanmwen.com')
            
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!');
        $this->$mailer->send($email);

        // ...
    }
}