<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendConfirmationEmail(string $to, string $subject, string $body): void
    {
        $email = (new Email())
            ->from(new Address('your-email@outlook.com', 'Your Name'))
            ->to($to)
            ->subject($subject)
            ->html($body);

        $this->mailer->send($email);
    }
}
