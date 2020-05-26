<?php

namespace App\Controller;

use App\Entity\Consomme;
use App\Form\ConsommeType;
use App\Repository\ConsommeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/consomme")
 */
class ConsommeController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/ajout",name ="ajout_consommés", methods={"POST"})
     */
    public function AjoutConsomme(Request $request , SerializerInterface $serializer , EntityManagerInterface $em)
    {
        $JsnRecu= $request->getContent();
        $consome = $serializer->deserialize($JsnRecu, Consomme::class,'json');
        $em->persist($consome);
        $em->flush();
        return $this->json($consome,201);
    }








    /**
     * @Route("/", name="consomme_index", methods={"GET"})
     */
    public function index(ConsommeRepository $consommeRepository): Response
    {
        return $this->render('consomme/index.html.twig', [
            'consommes' => $consommeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="consomme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $consomme = new Consomme();
        $form = $this->createForm(ConsommeType::class, $consomme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($consomme);
            $entityManager->flush();

            return $this->redirectToRoute('consomme_index');
        }

        return $this->render('consomme/new.html.twig', [
            'consomme' => $consomme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consomme_show", methods={"GET"})
     */
    public function show(Consomme $consomme): Response
    {
        return $this->render('consomme/show.html.twig', [
            'consomme' => $consomme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="consomme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Consomme $consomme): Response
    {
        $form = $this->createForm(ConsommeType::class, $consomme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consomme_index');
        }

        return $this->render('consomme/edit.html.twig', [
            'consomme' => $consomme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="consomme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Consomme $consomme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$consomme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($consomme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('consomme_index');
    }
}
