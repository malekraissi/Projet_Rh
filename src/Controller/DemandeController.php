<?php

namespace App\Controller;

use App\Entity\Demande;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * @Route("/demande", name="demande")
 */

class DemandeController extends AbstractController
{

    public function index()
    {
    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/ajout",name ="affiche_type", methods={"POST"})
     */
    public function AjoutDemande(Request $request , SerializerInterface $serializer , EntityManagerInterface $em)
    {
        $JsonRecu= $request->getContent();
        $demande = $serializer->deserialize($JsonRecu, Demande::class,'json');
        $em->persist($demande);
        $em->flush();
           return $this->json($demande,201);
    }




}
