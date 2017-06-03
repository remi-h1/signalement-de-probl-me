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
use PPE4\Bundle\Entity\Signalement;
use PPE4\Bundle\Entity\TypeDeSignalement;
use PPE4\Bundle\Entity\Administre;

class SignalementController extends FOSRestController
{
	/**
     * @Rest\Get("/signalement")
     */
	// récupère tous les signalements
    public function getAction()
    {
      $restresult = $this->getDoctrine()->getRepository('PPE4Bundle:Signalement')->findAll();
        if ($restresult === null) {
          return new View("there are no signalement exist", Response::HTTP_NOT_FOUND);
     }
        return $restresult;
    }

	 /**
	 * @Rest\Get("/signalement/{id}")
	 */
	 // récupère un seul signalement
	 public function idAction($id)
	 {
	   $singleresult = $this->getDoctrine()->getRepository('PPE4Bundle:Signalement')->find($id);
	   if ($singleresult === null) {
	   return new View("Signalement not found", Response::HTTP_NOT_FOUND);
	   }
	 return $singleresult;
	 }

	  /**
	 * @Rest\Post("/signalement/")
	 */
	  // permet de créer un signalement
	 public function postAction(Request $request)
	 {
	     $data = new Signalement;
	     $administre = $request->get('administre'); // id de l'administré
	     $TypeDeSignalement = $request->get('TypeDeSignalement'); // l'id du type de signalement
	     $objet = $request->get('objet');
	     $longitude = $request->get('longitude');
	     $latitude = $request->get('latitude');
	     $description = $request->get('description');

	     $dateNow = date("Y-m-d H:i:s");

		 if(empty($administre) || empty($TypeDeSignalement) || empty($objet)|| empty($longitude) || empty($latitude))
		 {
		   return new View("Les champs obligatoires sont mal complétés", Response::HTTP_NOT_ACCEPTABLE); 
		 } 

		  $adm = $this->getDoctrine()->getRepository('PPE4Bundle:Administre')->find($administre); // on récupère l'objet administré correspondant à l'id administre
		  $typeS = $this->getDoctrine()->getRepository('PPE4Bundle:TypeDeSignalement')->find($TypeDeSignalement); // on récupère l'objet typeDeSignalement correspondant à l'id typeDeSignalement

		  // on vérifie que les ids de l'administré et du type de signalement soient correctes
		  if($adm === null)
		     return new View("L'id de l'administré est erroné", Response::HTTP_NOT_ACCEPTABLE); 

		 if($typeS === null)
		     return new View("L'id du type de signalement est erroné", Response::HTTP_NOT_ACCEPTABLE); 

		  // on attribut les valeurs à l'objet data de la classe Signalement
		  $data->setAdministre($adm);
		  $data->setTypeDeSignalement($typeS);
		  $data->setObjet($objet);
		  $data->setHeureDate(new \DateTime()); // on ajoute l'heure et la date actuelle, définit selon le fuseau horaire défnit dans php.ini à la ligne : date.timezone = "Europe/Paris"
		  $data->setLongitude($longitude);
		  $data->setLatitude($latitude);
		  $data->setDescription($description);

		  // on persite les données vers la base de données
		  $em = $this->getDoctrine()->getManager();
		  $em->persist($data);
		  $em->flush();

		  return "Le signalement a été ajouté";

	 }
}