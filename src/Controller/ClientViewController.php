<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client")
 */
class ClientViewController extends AbstractController
{

    /**
     * @Route("/{id}", name="client_show", methods={"GET"})
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
     * @Route("/{id}", name="client_show", methods={"GET"})
     */
    public function showAll(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Client::class);
        $clients = $repository->findAll();
        return $this->render('client/show_all_clients.html.twig', ['clients' => $clients]);
    }

}
