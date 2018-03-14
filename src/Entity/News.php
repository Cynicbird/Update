<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private  $srcImageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $articleURL;
    /**
     *@ORM\Column(type="datetime", nullable=true)
     */
    private $releaseTime;

    /**
     * @ORM\Column(name="id_api", type="string", length=255, nullable=true)
     */
    private $id_api;


    /**
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $category;

    /**
     *
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="news")
     */

    private $comment;


    function getComment() {
        return $this->comment;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function getTitle() {
        return $this->title;
    }

    function getSummary() {
        return $this->summary;
    }

    function getSrcImageFile() {
        return $this->srcImageFile;
    }

    function getArticleURL() {
        return $this->articleURL;
    }

    function getReleaseTime() {
        return $this->releaseTime;
    }

    function getId_api() {
        return $this->id_api;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setSummary($summary) {
        $this->summary = $summary;
    }

    function setSrcImageFile($srcImageFile) {
        $this->srcImageFile = $srcImageFile;
    }

    function setArticleURL($articleURL) {
        $this->articleURL = $articleURL;
    }

    function setReleaseTime($releaseTime) {
        $this->releaseTime = $releaseTime;
    }

    function setId_api($id_api) {
        $this->id_api = $id_api;
    }

    public function setIdApis(Comment $c) {
        $this->firstComment = $c;
    }

    function getCategory() {
        return $this->category;
    }

    function setCategory($category) {
        $this->category = $category;
    }

}
