<?php

namespace App\Controller\Api;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use App\Repository\UserRepository;
use App\Entity\User;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UserController extends AbstractFOSRestController
{
    /**
     * @Rest\Get(path="/user")
     * @Rest\View(serializerGroups={"user"}, serializerEnableMaxDepthChecks=true)
     */
    public function index(UserRepository $userRepository)
    {
        
        $result = [
                    "processed" => 23,
                    "deleted" => 545,
                    "pending" => [
                        "groupOne" => 123,
                        "groupTwo" => 43
                    ]
                  ];
            
        

        // $person = new User();
        // $person->setName('foo');
        // $person->setLastName('holaaa');

        $data = [
            "status" => 'rest.success',
            "statusCode" => JsonResponse::HTTP_OK, // 200
            "message" => 'ok',
            "data" =>$result,
            "errors" => NULL,
        ];


        // $jsonContent = $serializer->serialize($data, 'json');

        // return $jsonContent;
        // return View::create($data, Response::HTTP_CREATED);
        return $this->json($data);


    }
}



