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
            'dbname'   => GOLD_APP_DATABASE
        ];
        $config = ORMSetup::createAttributesMetadataConfiguration($paths, $isDevMode);
        $connection = DriverManager::getConnection($dbParams, $config);
        $this->entityManager = new EntityManager($connection, $config);
    }


    public function save($object) {
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }
}