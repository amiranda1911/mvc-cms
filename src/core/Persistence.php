<?php

namespace core;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

class Persistence { 
    private $entityManager;

    public function __construct() {
        $paths = [ROOT."/src/app/model"];
        $isDevMode = true;
        // the connection configuration
        $dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => MYSQL_USER,
            'password' => MYSQL_PASSWORD,
            'host' => MYSQL_HOST,
            'dbname'   => APP_DATABASE
        ];
        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
        $connection = DriverManager::getConnection($dbParams, $config);
        $this->entityManager = new EntityManager($connection, $config);
    }

    public function findAll(String $className, $params = array()) {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('c')->from($className, 'c');
        if(array_key_exists('order', $params)){
            $queryBuilder->add('orderBy', $params['order'] );
        }
        return $queryBuilder->getQuery()->getResult();
    }

    public function find(String $className, String $id) {
        return $this->entityManager->find($className, $id);
    }

    public function save($object) {
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }
}