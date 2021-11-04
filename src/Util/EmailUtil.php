<?php

namespace App\Util;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Envios de correos 
 */
class EmailUtil extends AbstractController
{
	private $mailer;

	function __construct( \Swift_Mailer $mailer )
	{
		$this->mailer = $mailer;
	}

	public function sedMail($content)
	{
        $data = [
            'name'    => $content->get('name'),
            'email'   => $content->get('email'),
            'phone'   => $content->get('phone'),
            'company' => $content->get('company'),
            'message' => $content->get('message'),
            'date'    => date('Y-m-d H:i:s'),
        ];

		$message = (new \Swift_Message('Test Email'))
                    ->setFrom('mpenav28@gmail.com')
                    ->setTo('mpenav28@gmail.com')
                    ->setBody(
                        $this->renderView(
                            // templates/emails/registration.html.twig
                            'emails/test.html.twig',compact('content'),
                        ),
                        'text/html'
                    );

        $resul = $this->mailer->send($message);

        return $data;
	}
}
?>