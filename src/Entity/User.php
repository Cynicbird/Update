<?php  

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User 
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
    private $username;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=100)
     */
      private $password;
      
        /**
     * @ORM\ManyToOne(targetEntity="Bookmark")
     */
      private $bookmark;
      function getBookmark() {
          return $this->bookmark;
      }

      function setBookmark($bookmark) {
          $this->bookmark = $bookmark;
      }

          function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

  
}
