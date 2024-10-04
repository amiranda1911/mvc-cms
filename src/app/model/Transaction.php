<?php

namespace app\model;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'transactions')]

class Transaction {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'id')]
    private $id;

    #[ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    private User|null $user;

    #[ORM\Column(type: 'integer', name: 'amount')]
    private $amount;

    #[ORM\Column(type: 'float', name: 'buyValue')]
    private $buyValue;

    #[ORM\Column(type: 'datetime', name: 'timestamp')]
    private $timestamp;

    #[ORM\Column(type: 'string', name: 'buy_value')]
    private $hash;

    public function __construct($id, $buyValue, $amount, $user, $timestamp, $hash) {
        $this->id = $id;
        $this->buyValue = $buyValue;
        $this->amount = $amount;
        $this->user = $user;
        $this->timestamp = $timestamp;
        $this->hash = $hash;
    }

    public static function createTransaction(
            $buy_value, 
            $ammount, 
            User $user, 
            $lastHash
        ): Transaction {
        $timestamp = new \DateTime('now', new \DateTimeZone('UTC'));
        $transaction = new Transaction(null, $buy_value, $ammount, $user, $timestamp, sha1($user->getId()."{$ammount}{$buy_value}{$timestamp->getTimestamp()}{$lastHash}"));
        return $transaction;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function getHash() {
        return $this->hash;
    }

    public function getBuyValue() {
        return $this->buy_value;
    }

}