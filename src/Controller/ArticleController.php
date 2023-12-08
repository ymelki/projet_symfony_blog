<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles=$articleRepository->findAll();
        return $this->render('article/index.html.twig', [
           'liste_articles'=>$articles
        ]);
    }

    #[Route('/{id}', name: 'app_article_detail')]
    public function detail(
        CommentaireRepository $commentaireRepository,
        // Request $request,
        // ArticleRepository $articleRepository,
        Article $article): Response
    {
        //dd($request->get("id")); => 202
        //dd($articleRepository->find($request->get("id")));

        
        // obj 1. :  afficher l'id de l'url
        // 1 solution : request
        // 2 solution : placer l'id dans la fonction
        // et on l'affiche dans le dd  
        // obj 2. : afficher l'article correspondant à cet id
        // on va mettre la classe concerné article 
        // dans la fonction
        // symfony : utiliser le repository pour aller
        // chercher dans la B.D. larticle correspondant
        // a cet id

        //dd($article);
        //dd("test");
        //$info=$article->getCommentaires();
        // recuperer les commentaires de la BD.
        

        dd($commentaireRepository->findBy(
            [
                'articles' => $article->getId()
            ]
            ));
        //dd($info);

        return $this->render('article/detail.html.twig', [
            'articles'=>$article
         ]);
    }
}
