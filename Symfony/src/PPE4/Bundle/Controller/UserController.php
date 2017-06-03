<?php
// by Rémi H.

namespace PPE4\Bundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use PPE4\Bundle\Entity\User;

class UserController extends FOSRestController
{
	/**
     * @Rest\Get("/user")
     */
    public function getAction()
    {
      $restresult = $this->getDoctrine()->getRepository('PPE4Bundle:User')->findAll();
        if ($restresult === null) {
          return new View("there are no users exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }

	 /**
	 * @Rest\Get("/user/{id}")
	 */
	 public function idAction($id)
	 {
	   $singleresult = $this->getDoctrine()->getRepository('PPE4Bundle:User')->find($id);
	   if ($singleresult === null) {
	   return new View("user not found", Response::HTTP_NOT_FOUND);
	   }
	 return $singleresult;
	 }

	  /**
	 * @Rest\Post("/user/")
	 */
	 public function postAction(Request $request)
	 {
	     $data = new User;
	     $name = $request->get('name');
	     $role = $request->get('role');

		 if(empty($name) || empty($role))
		 {
		   return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE); 
		 } 
		  $data->setName($name);
		  $data->setRole($role);
		  $em = $this->getDoctrine()->getManager();
		  $em->persist($data);
		  $em->flush();
		  return "User Added successfully";

	 }
}
