<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
        
     /**
     * @ORM\Column(name="name",type="string", length=255)
     */
    private $name;
   
      function SetName($name) {
        return $this->name=$name;
      }
           function getTitle() {
        return $this->name;
        
    }

    

}