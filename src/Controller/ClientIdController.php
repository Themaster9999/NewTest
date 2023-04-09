<?php

namespace App\Controller;

use App\Entity\Details;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ClientIdController extends AbstractController
{
    private $emi;

    public function __construct(EntityManagerInterface $emi)
    {
        $this->emi = $emi;
    }

    #[Route('/client/{id}', name: 'app_client_id', methods:['GET','HEAD'])]
    public function index($id): Response
    {
        $rep = $this->emi->getRepository(Details::class);

        $clients = $rep->find(['id' => $id]);
        
        $v = $clients->getProducts();
        $a = array();
        $total = null;

        foreach($v as $i)
        {
            array_push($a, $i->getName());
            $total += $i->getPrice();
        }

        return $this->render("total.html.twig" , ["tp" => $total , "name" => $clients->getName(), "pn" => $a]);
    }
}
