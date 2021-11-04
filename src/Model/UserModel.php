<?php

namespace App\Model;

use App\Dao\UserDao as userDao;
use Symfony\Component\HttpFoundation\Request;
use App\Util\EmailUtil as mailer;

class UserModel
{

	private
		$userDao,
		$mailer;


	function __construct(userDao $userDao, mailer $mailer)
	{
		$this->userDao = $userDao;
		$this->mailer = $mailer;
	}



	public function indexUser()
	{
		return $this->userDao->index();
	}






	public function storeUser($request)
	{
		return $this->userDao->save($request->request);
	}






	public function updateUser($request, $id)
	{

		if (is_numeric($id))
		{
       		$user_request = $request;
       		$data = $this->userDao->update($user_request->request, $id);
		}
		else{
			$data = ' El id debe ser numerico';
		}

		return $data;
	}





	public function showUser($id)
	{
		if(is_numeric($id))
		{
			$data = $this->userDao->show($id);
		}
		else{
			$data = 'El id debe ser numerico';
		}

		return $data;
	}





	public function destroyUser($id)
	{
		if(is_numeric($id))
		{	
			$data = $this->userDao->destroy($id);
		}
		else{
			$data = 'El id debe ser numerico';
		}

		return $data;
	}





	public function sedMailUser($request)
	{
		return 'aqui';
	}
}
?>