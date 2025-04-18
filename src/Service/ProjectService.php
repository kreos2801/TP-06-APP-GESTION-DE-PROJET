<?php

namespace App\Service;

use App\Repository\ProjectRepository;

class ProjectService
{
    public function __construct(
        private readonly ProjectRepository $projectRepo
    ){
    }

    public function getProjectList(User $user): array
    {
        $project = [];

        foreach ($user->getProjects() as $project){
            $project[$project->getId()] = [
                'id' => $project->getId(),
                'name' => $project->getName(),
                'keyCode' => $project->getKeyCode(),
                'lead' => (string) $project->getLeadUser(),
            ];
        }

        return $project;
    }
}