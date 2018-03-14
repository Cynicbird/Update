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


    /**
     * @ORM\ManyToOne(targetEntity="Apis")
     */
    private $api;


    /**
     * @ORM\ManyToOne(targetEntity="News")
     */
    private $news;

    function getName() {
        return $this->name;
    }

    function getApi() {
        return $this->api;
    }

    function getNews() {
        return $this->news;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setApi($api) {
        $this->api = $api;
    }
    function setNews($news) {
        $this->news = $news;
    }

    function getTitle() {
        return $this->name;

    }



}