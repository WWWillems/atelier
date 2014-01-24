<?php

    namespace Atelier;

    class myClass
    {
        /**
        * The connection
        *
        * @var \Doctrine\DBAL\Connection
        */
        private $db;

        /**
        * Constructor
        *
        * @param $db \Doctrine\DBAL\Connection
        */
        public function __construct($db)
        {
        $this->db = $db;
        }

        // ...
    }