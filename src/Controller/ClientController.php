<?php

namespace App\Controller;

use App\Entity\Details;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    private $emi;

    public function __construct(EntityManagerInterface $emi)
    {
        $this->emi = $emi;
    }

    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {
        $rep = $this->emi->getRepository(Details::class);

        $clients = $rep->count([]);

        return $this->render("base.html.twig" , ["count" => $clients]);
    }
}
