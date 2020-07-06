<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\Utilisateur;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * @Route("/demande")
 */
class DemandeController extends AbstractController
{


    /**
      * @param Request $request
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $em
     * @Route("/ajout",name="add_demande" , methods={"post"})
     */
    public function AjouterDemande(Request $request , SerializerInterface $serializer , EntityManagerInterface $em)
    {
        $JsonRecu= $request->getContent();
        $demande = $serializer->deserialize($JsonRecu,Demande::class,'json');
        $em->persist($demande);
        $em->flush();
        return $this->json($demande,201);

    }








    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/ajout" ,name ="affiche_type", methods={"GET","POST"})
     */
    public function AjoutDemande(Request $request , SerializerInterface $serializer , EntityManagerInterface $em)
    {
        $JsonRecu= $request->getContent();
        $demande = $serializer->deserialize($JsonRecu, Demande::class,'json');
        $em->persist($demande);
        $em->flush();
        return $this->json($demande,201);
    }






    /**

     * @Route("/", name="demande_index", methods={"GET"})
     */
    public function index(DemandeRepository $demandeRepository): Response
    {
        return $this->render('demande/index.html.twig', [
            'demandes' => $demandeRepository->findAll(),
        ]);
    }





    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/info" , name ="chef_info" , methods={"GET"})
     */
    public function AfficheInfo(Request $request,DemandeRepository $demandeRepository ){
        $nom=$request->query->get('nom');

        $Result=$demandeRepository->findOneByNomCHef($nom);
        if (empty($Result)){
            return new JsonResponse("pas de données" );
        }
        return  $this->json($Result,200);
    }

    /**
     * @Route("/{id}/{email}/valider", name="demande_valider", methods={"GET","POST"})
     */
    public function MailValidation(Request $request,$id ,$email, \Swift_Mailer $mailer): Response
    {


        $message = (new \Swift_Message('Nouveau contact'))
            ->setSubject("Bienvenue à ABSHORE")
            ->setFrom('malek.raissi9@gmail.com')
            ->setReplyTo('malek.raissi9@gmail.com')
            ->setTo($email)
            // On crée le texte avec la vue
            ->setBody(
                $this->renderView(
                    'demande/Email.html.twig'
                ),
                'text/html'
            );
        $mailer->send($message);

        $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');

        if (!$mailer) {
            throw $this->createNotFoundException(
                'rien a envoyé '
            );
        }



        return $this->render('demande/validation.html.twig');

    }



    /**
     * @Route("/{id}", name="demande_show", methods={"GET"})
     */
    public function show( UtilisateurRepository $utilisateurRepository,Demande $demande): Response
    {
        $utilisateurs = $utilisateurRepository->findEmailChef();
        return $this->render('demande/show.html.twig',
            ['utilisateurs'=>$utilisateurs,
                'demande' => $demande,
            ]);
    }

    /**
     * @Route("/{id}/edit", name="demande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Demande $demande): Response
    {
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_index');
        }

        return $this->render('demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Demande $demande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($demande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demande_index');
    }
}
