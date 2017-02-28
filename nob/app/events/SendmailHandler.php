<?php

class SendmailHandler
{
    public function handle(MailInterface $mail)
    {
        foreach((array) $mail->getTo() as $email => $name)
        {
            $subject = $mail->getSubject();

            $template = $mail->getTemplate();

            $data = $mail->getData();

            $attachment = $mail->getAttachment();

            Mail::send($template, $data, function($message) use ($email, $name, $attachment, $subject)
            {
                $message->to($email,$name)
                    ->subject($subject);

                if( ! empty($attachment) ) foreach($attachment as $attach)
                {
                    $message->attach($attach);
                }
            });
        }
    }
}