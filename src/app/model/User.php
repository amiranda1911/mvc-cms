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
    
    #[ORM\Column(type: 'integer', name: 'amount')]
    private $amount;

    #[ORM\Column(type: 'float', name: 'wallet')]
    private $wallet;

    #[OneToMany(targetEntity: Transaction::class, mappedBy: 'user', indexBy: 'symbol')]
    private Collection $stocks;

    public function __construct($id, $name, $amount, $wallet) {
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
        $this->wallet = $wallet;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAmount() {
        return $this->amount;
    }
    
    public function addAmount($value) {
        if(is_numeric($value) and $value > 0) {
            $this->amount += $value;
        }else{
            throw new \InvalidArgumentException('Valor adicionado não pode ser negativo');
        }
    }

    public function removeAmmount($value) {
        if(is_numeric($value) and $value > 0) {
            if ($value > $this->amount) {
                throw new \InvalidArgumentException('Valor removido não pode ser mair que o saldo disponível');
            }
            $this->amount -= $value;
        }else{
            throw new \InvalidArgumentException('Valor removido não pode ser negativo');
        }
    }

    public function getWallet() {
        return $this->wallet;
    }

    public function addWallet($value) {
        if(is_numeric($value) and $value > 0) {
            $this->wallet += $value;
        }else{
            throw new \InvalidArgumentException('Valor adicionado não pode ser negativo');
        }
    }

    public function removeWallet($value) {
        if(is_numeric($value) and $value > 0) {
            if ($value > $this->wallet) {
                throw new \InvalidArgumentException('Valor removido não pode ser maior que o saldo disponível');
            }
            $this->wallet -= $value;
        }else{
            throw new \InvalidArgumentException('Valor removido não pode ser negativo');
        }
    }

}