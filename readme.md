
Requirements:
PHP 5.3+ any database supported by PDO (tested with MySQL, SQLite, PostgreSQL, MS SQL, Oracle)

Usage: 

1. Add the following to your composer.json

    "require": {
        
        "direct-solution/solution-orm" : "dev-master"
        
    },

2. Create a Base Model class in your project like this:


        <?php

        namespace SolutionMvc\Model;

        use PDO;

        /**
         * Description of BaseModel
         *
         * @author doug
         */
        class BaseModel {

            /**
             * @var null Database Connection
             */
            public $db = null;
            public $orm = null;

            /** @var string */
            private $tableName;

            /**
             * @var null Model
             */
            public $model = null;

            /**
             * Whenever controller is created, open a database connection too and load "the model".
             */
            function __construct() {
                $this->openDatabaseConnection();

                $this->tableName = $this->tableNameByClass(get_class($this));
            }

            /**
             * Open the database connection with the credentials from application/config/config.php
             */
            private function openDatabaseConnection() {
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
                $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
                $this->orm = new \SolutionORM\SolutionORM($this->db);
            }

            /**
             * Determine table by class name
             * @param string
             * @return string
             * @result:Pages => pages, ArticleTag => article_tag
             */
            private function tableNameByClass($className) {
                $tableName = explode("\\", $className);
                $tableName = lcfirst(array_pop($tableName));

                $replace = array(); // A => _a
                foreach (range("A", "Z") as $letter) {
                    $replace[$letter] = "_" . strtolower($letter);
                }

                return strtr($tableName, $replace);
            }

        }


This needs finishing...



