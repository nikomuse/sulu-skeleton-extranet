<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sulu\Bundle\SecurityBundle\Entity\User as SuluUser;
use Sulu\Bundle\SecurityBundle\Entity\UserRepository;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'se_users')]
class User extends SuluUser {
    /**
     * @return string
     */
    public function __toString(): string {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}