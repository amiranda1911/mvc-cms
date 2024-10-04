<?php

namespace app\controller;

use core\Controller;
use core\View;
use app\model\User;
use app\model\Transaction;

class TransactionController extends Controller{
    public function index() {
        
    }

    public function create(...$params) {

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($params[0]) && (intval($params[0]) > 0)) {
                $user = $this->persistence->find('app\model\User', $params[0]);
                if($user) {
                    $this->session->user = $params[0];
                    $view = new View('transaction/create', ['user' => $user]);
                    $view->render();
                }
            }
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $user = $this->persistence->find('app\model\User', $this->session->user);
            $last = $this->persistence->findAll('app\model\Transaction', ['order' => 'c.id DESC']);
            
            $lastHash = APP_SEED;

            if(!empty($last)){
                $lastHash = $last[0]->getHash();
            }
            $buyValue = floatval($_REQUEST['buy-value']);
            $amount = intval($_REQUEST['amount']);
            $price = $buyValue * $amount;
            
            if($user->getWallet() > $price){
                $user->removeWallet($price);
                $user->addAmount($amount); 
            } else {
                die ("no credits");
            }
            
            $transaction  = Transaction::createTransaction(
                $buyValue,
                $amount,
                $user,
                $lastHash
                );
            
        
            $this->persistence->save($transaction);
            $this->persistence->save($user);

            die('compra realizada');
        }
    }

    public function view(...$params) {
        if(isset($params[0]) && (intval($params[0]) > 0)){
            $user = $this->persistence->find('app\model\User', $params[0]);
            $view = new View('user/view',
                ['id' => $user->getId(),
                'name' => $user->getName(),
                'weigth' => $user->getWeigth()
            ]);
            $view->render();
        }
    }
}