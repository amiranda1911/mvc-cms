<?php

namespace core;

class Persistence { 
    private $entityManager;

    public function __construct() {
        $params = [
            'url' => 'mysql:'.MYSQL_USER.':'.MYSQL_PASSWORD.'@'.MYSQL_HOST.'/'.APP_DATABASE
        ];
        $paths = [ROOT."/src/app/model"];
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        $this->entityManager = EntityManager::create($params, $config);
    }


    public function save($object) {
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }
}