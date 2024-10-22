<?php

namespace app\model;
use Doctrine\ORM\Mapping  as ORM;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity]
#[ORM\Table(name: 'users')]

class User {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'id')]
    private int|null $id = null;
    
    #[ORM\Column(type: 'string', name: 'name')]
    private $name;
    
    #[ORM\Column(type: 'string', name: 'name')]
    private $email; 

    #[ORM\Column(type: 'string', name: 'name')]
    private $password;


    public function __construct($id, $name, $email, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function check_password(string $password) {
        return $this->password == sha1($password);
    }

    public function setName(string $name) {
        $this->name = $name;
    }
    
    public function setPassword(string $password) {
        $this->password = sha1($password);
    }  

}