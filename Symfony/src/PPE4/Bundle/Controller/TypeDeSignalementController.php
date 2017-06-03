<?php

namespace PPE4\Bundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use PPE4\Bundle\Entity\TypeDeSignalement;

class TypeDeSignalementController extends FOSRestController
{
	  /**
	 * @Rest\Get("/typeDeSignalements/")
	 */
	 public function getAction()
	 {
	 	$restresult = $this->getDoctrine()->getRepository('PPE4Bundle:TypeDeSignalement')->findAll();
        if ($restresult === null) {
          return new View("Il n'existe aucun type de signalement", Response::HTTP_NOT_FOUND);
	     }
	     return $restresult;
	 }

}