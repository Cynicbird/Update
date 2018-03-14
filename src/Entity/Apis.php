<?php

namespace App\Entity;

use App\Repository\ApisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApisRepository")
 */
class Apis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $Id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;
    /**
     * @ORM\Column(type="string", length=25)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="News")
     */
    private $news;

    function getName() {
        return $this->name;
    }

    function getUrl() {
        return $this->url;
    }

    function getType() {
        return $this->type;
    }



    function setName($name) {
        $this->name = $name;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setType($type) {
        $this->type = $type;
    }

}
