<?php
namespace App\Util;

use FOS\RestBundle\Controller\AbstractFOSRestController;

class HelpersUtil extends AbstractFOSRestController
{
    public function responseJSON($data)
    {
        return $this->handleView($this->view($data)->setFormat('json'));
	}

	public function responseExceptionJSON($e)
	{
        return $this->handleView($this->view([
        	'success' => false,
        	'message' => 'Error inesperado: ' . $e->getMessage(),
        ])->setFormat('json'));
    }
}
