<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sulu\Bundle\CategoryBundle\Entity\Category as SuluCategory;
use Sulu\Bundle\CategoryBundle\Entity\CategoryRepository;


#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: 'ca_categories')]
class Category extends SuluCategory {
    /**
     * @return string
     */
    public function __toString(): string {
        return $this->findTranslationByLocale($this->getDefaultLocale()
        )->getTranslation();
    }
}