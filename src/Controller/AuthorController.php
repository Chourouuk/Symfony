<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author/{name}', name: 'app_show_author')]
    public function showAuthor(string $name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name,
        ]);
    }
    #[Route('/authors', name: 'app_list_authors')]
public function listAuthors(): Response
{
    $authors = [
        ['id' => 1, 'picture' => '/images/OIP.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
        ['id' => 2, 'picture' => '/images/william-shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
        ['id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
    ];

    return $this->render('author/list.html.twig', [
        'authors' => $authors,
    ]);
}
#[Route('/author/details/{id}', name: 'app_author_details')]
public function authorDetails(int $id): Response
{
    $authors = [
        1 => ['picture' => '/images/OIP.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
        2 => ['picture' => '/images/william-shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
        3 => ['picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
    ];

    if (!isset($authors[$id])) {
        throw $this->createNotFoundException('Auteur non trouvé');
    }

    return $this->render('author/showAuthor.html.twig', [
        'author' => $authors[$id],
    ]);
}


}
