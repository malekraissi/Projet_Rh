<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{

    /**
     * @Route("/recffherche", name="rechfferche")
     */
    public function index(Request $request, UtilisateurRepository $utilisateurRepository)
    {

        $form = $this->createFormBuilder(null)
            ->add('search', TextType::class)

            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form['search']->getData();
            dump($data);

            $utilisateurs = $utilisateurRepository->findBy(array('prenom' => $data));
        }



        return $this->render('recherche.html.twig', [
            'form' => $form->createView()
        ]);
    }





}

