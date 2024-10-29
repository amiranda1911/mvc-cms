<?php

namespace app\model;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'posts')]

class Post {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'id')]
    private int|null $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user;

    #[ORM\Column(type: 'string', name: 'title')]
    private $title;

    #[ORM\Column(type: 'text', name: 'content')]
    private $content;

    public function __construct($title, $content, $user){
        $this->title = $title;
        $this->content = $content;
        $this->user = $user;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setContent(string $content) {
        $this->content = $content;
    }

    public function getUser() {
        return $this->user;
    }

}