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
use PPE4\Bundle\Entity\Administre;

class AdministreController extends FOSRestController
{
	  /**
	 * @Rest\Get("/connexion/")
	 */
	  // vérifier la connxion d'un administré
	 public function connexion(Request $request)
	 {
	     $data = new Administre;
	     $identifiant = $request->get('identifiant');
	     $motDePasse = $request->get('motDePasse');


		$administre = $this->getDoctrine()->getRepository('PPE4Bundle:Administre')->findOneByIdentifiant($identifiant);

		if ($administre === null) {
		   return new View("Aucun administré pour cet identifiant", Response::HTTP_NOT_FOUND);
		   }

	    if ($administre->getMotDePasse() == $motDePasse)
	    	return true;
	    else
	    	return false;
	 }

	 	 /**
     * @Rest\Get("/unAdministre/{identifiant}")
     */
	 	 // renvoyé les données de l'administré comme son id, son prénom et son nom
    public function adminstreAction($identifiant)
    {
      $singleresult = $this->getDoctrine()->getRepository('PPE4Bundle:Administre')->findOneByIdentifiant($identifiant);
	   if ($singleresult === null) {
	   return new View("Aucun administré pour cet identifiant", Response::HTTP_NOT_FOUND);
	   }
	 return $singleresult;
    }

}