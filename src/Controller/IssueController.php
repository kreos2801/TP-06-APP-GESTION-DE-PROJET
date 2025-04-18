<?php

namespace App\Controller;

use App\Entity\Issue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IssueController extends AbstractController
{
    #[Route('/issue/{id}', name: 'issue_show')]
    public function show(?Issue $issue): Response
    {
        return $this->render('issue/show.html.twig', [
            'issue' => $issue,
        ]);
    }

    #[Route('/issue', name: 'issue_list')]
    public function list(): Response
    {
        return $this->render('issue/list.html.twig', [
            'controller_name' => 'IssueController',
        ]);
    }
}
