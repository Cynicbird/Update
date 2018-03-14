<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookmarkRepository")
 */
class Bookmark
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="News")
     */

    private $news;


    function getName() {
        return $this->name;
    }

    function getNews() {
        return $this->news;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setNews($news) {
        $this->news = $news;
    }
}
