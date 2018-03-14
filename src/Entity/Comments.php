<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

/**
 * @ORM\Entity(repositoryClass="CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descrption;




    /**
     * @Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $created_on;



    function getName() {
        return $this->name;
    }

    function getDescrption() {
        return $this->descrption;
    }

    function getCreated_on() {
        return $this->created_on;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescrption($descrption) {
        $this->descrption = $descrption;
    }

    function setCreated_on($created_on) {
        $this->created_on = $created_on;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

}
