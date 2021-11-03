<?php

namespace App\Controller\Api;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
// use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Model\UserModel as model;
use App\Util\HelpersUtil as util;

class UserController extends AbstractFOSRestController
{

    private
        $model,
        $util;

    public function __construct(model $model, util $util)
    {
        $this->model = $model;
        $this->util = $util;
    }


    /**
     * @Rest\Get(path="/user")
     */
    public function index(UserRepository $userRepository)
    {
        try {
            return $this->util->responseJSON([
                'success'    => true,
                'message'    => 'OK',
                'data'       => $this->model->indexUser(),
                'statusCode' => JsonResponse::HTTP_OK, // 200
                'errors'     => NULL,
            ]);
        } catch (Exception $e) {
            return $this->util->responseExceptionJSON($e);
        }

    }

    /**
     * @Rest\Post(path="/user/store")
     */
    public function store(Request $request)
    {
        try {
            return $this->util->responseJSON([
                'success'    => true,
                'message'    => 'OK',
                'data'       => $this->model->storeUser($request),
                'statusCode' => JsonResponse::HTTP_OK, // 200
                'errors'     => NULL,
            ]);
        } catch (Exception $e) {
            return $this->util->responseExceptionJSON($e);
        }
    }

    /**
     * @Rest\Get(path="/user/{id}/show")
     */
    public function show(int $id)
    {
        try {
            return $this->util->responseJSON([
                'success'    => true,
                'message'    => 'OK',
                'data'       => $this->model->showUser($id),
                'statusCode' => JsonResponse::HTTP_OK, // 200
                'errors'     => NULL,
            ]);
        } catch (Exception $e) {
            return $this->util->responseExceptionJSON($e);
        }

    }

    /**
     * @Rest\Put(path="/user/{id}/update")
     */
    public function update(Request $request, int $id)
    {
        try {
            return $this->util->responseJSON([
                'success'    => true,
                'message'    => 'OK',
                'data'       => $this->model->updateUser($request, $id),
                'statusCode' => JsonResponse::HTTP_OK, // 200
                'errors'     => NULL,
            ]);
        } catch (Exception $e) {
            return $this->util->responseExceptionJSON($e);
        }
    }

    /**
     * @Rest\Delete(path="/user/{id}/destroy")
     */
    public function destroy(int $id)
    {
        try {
            return $this->util->responseJSON([
                'success'    => true,
                'message'    => 'OK',
                'data'       => $this->model->destroyUser($id),
                'statusCode' => JsonResponse::HTTP_OK, // 200
                'errors'     => NULL,
            ]);
        } catch (Exception $e) {
            return $this->util->responseExceptionJSON($e);
        }
    }
}



