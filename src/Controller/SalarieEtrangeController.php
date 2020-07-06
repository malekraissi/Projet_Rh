<?php

namespace App\Controller;

use App\Entity\SalarieEtrange;
use App\Form\SalarieEtrangeType;
use App\Repository\SalarieEtrangeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/salarie/etrange")
 */
class SalarieEtrangeController extends AbstractController
{
    /**
     * @Route("/", name="salarie_etrange_index", methods={"GET"})
     */
    public function index(SalarieEtrangeRepository $salarieEtrangeRepository): Response
    {
        return $this->render('salarie_etrange/index.html.twig', [
            'salarie_etranges' => $salarieEtrangeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="salarie_etrange_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $salarieEtrange = new SalarieEtrange();
        $form = $this->createForm(SalarieEtrangeType::class, $salarieEtrange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salarieEtrange);
            $entityManager->flush();

            return $this->redirectToRoute('salarie_etrange_index');
        }

        return $this->render('salarie_etrange/new.html.twig', [
            'salarie_etrange' => $salarieEtrange,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salarie_etrange_show", methods={"GET"})
     */
    public function show(SalarieEtrange $salarieEtrange): Response
    {
        return $this->render('salarie_etrange/show.html.twig', [
            'salarie_etrange' => $salarieEtrange,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="salarie_etrange_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SalarieEtrange $salarieEtrange): Response
    {
        $form = $this->createForm(SalarieEtrangeType::class, $salarieEtrange);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salarie_etrange_index');
        }

        return $this->render('salarie_etrange/edit.html.twig', [
            'salarie_etrange' => $salarieEtrange,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="salarie_etrange_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SalarieEtrange $salarieEtrange): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salarieEtrange->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salarieEtrange);
            $entityManager->flush();
        }

        return $this->redirectToRoute('salarie_etrange_index');
    }
}
