<?php

namespace App\Controller;

use App\Form\TvaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home/{name<[a-z]+>}', name: 'app_home')]
    public function index($name="yoel"): Response
    {
        $form= $this->createForm(TvaType::class);

         
        // dd($name);
        return $this->render('home/index.html.twig', [
            'name_url' => $name,
            'monFormulaire' => $form,
        ]);
    }
}
