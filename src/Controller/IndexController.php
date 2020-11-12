<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livraison")
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

}
