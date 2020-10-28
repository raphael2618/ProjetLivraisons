<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 */
class ClientViewController extends AbstractController
{

    /**
     * @Route("/show_client/{id}", name="showClient", methods={"GET"})
     */
    public function showClient($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $client = $repository->find($id);
        if(!$client) {
            throw $this->createNotFoundException("No client found for id" . $id);
        }
        return $this->render('client/show_client.html.twig', ['client' => $client]);
    }

    /**
     * @Route("/show_all_clients", name="showAll", methods={"GET"})
     */
    public function showAll(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $clients = $repository->findAll();
        return $this->render('client/show_all_clients.html.twig', ['clients' => $clients]);
    }

}
