<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/client")
 */
class ProduitController extends AbstractController
{

    /**
     * @Route("/new_produit", name="new", methods={"GET"})
     */
    public function new(Request $request) {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $produit = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();
            return $this->redirectToRoute('show_all_produits');
        }

        return $this->render('produit/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show_all_produits", name="showAll", methods={"GET"})
     */
    public function showAll(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repository->findAll();
        return $this->render('produit/show_all_produits.html.twig', ['produits' => $produits]);
    }
}
