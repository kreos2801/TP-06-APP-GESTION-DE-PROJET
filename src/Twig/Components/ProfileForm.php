<?php

namespace App\Twig\Components;

use App\Entity\User;
use App\Form\Type\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

#[AsLiveComponent('profile_form')]
class ProfileForm extends AbstractController
{
    use ComponentWithFormTrait;
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp]
    public ?User $user = null;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(UserType::class, $this->user ?: $this->getUser());
    }

    #[LiveAction]
    public function save(EntityManagerInterface $em): void
    {
        // Valider le formulaire
        $this->validate();
        
        // Soumettre le formulaire - cela applique les données validées à l'objet
        $this->submitForm();
        
        // Sauvegarder en base de données
        $em->flush();
        
    }
}