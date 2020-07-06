<?php

namespace App\Controller;

use App\Entity\Assurance;
use App\Form\AssuranceType;
use App\Repository\AssuranceRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/assurance")
 */
class AssuranceController extends AbstractController
{
    /**
     * @Route("/", name="assurance_index", methods={"GET"})
     */
    public function index(AssuranceRepository $assuranceRepository): Response
    {
        return $this->render('assurance/index.html.twig', [
            'assurances' => $assuranceRepository->findAll(),
        ]);

    }

    /**
     * @Route("/new", name="assurance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $assurance = new Assurance();
        $form = $this->createForm(AssuranceType::class, $assurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $file=$assurance->getNom();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('brochures_directory'),
                $fileName);
            $assurance->setNom($fileName);
            $entityManager->persist($assurance);
            $entityManager->flush();
            return $this->redirectToRoute('assurance_show' , array('id'=>$assurance->getId()));
        }
       // $utilisateurs = $assurance->getUtilisateur()->getNom();
        return $this->render('assurance/new.html.twig', [
            'assurance' => $assurance,
           // 'utilisateurs' => $utilisateurs,
            'form' => $form->createView(),

        ] );
    }

    /**
     * @Route("/{id}", name="assurance_show", methods={"GET"})
     */
    public function show(Assurance $assurance): Response
    {
        return $this->render('assurance/show.html.twig', [
            'assurance' => $assurance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="assurance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Assurance $assurance): Response
    {
        $form = $this->createForm(AssuranceType::class, $assurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assurance_index');
        }

        return $this->render('assurance/edit.html.twig', [
            'assurance' => $assurance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assurance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Assurance $assurance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assurance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($assurance);
            $entityManager->flush();

        }

        return $this->redirectToRoute('assurance_index');
    }
}
