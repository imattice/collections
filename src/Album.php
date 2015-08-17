<?php
    class Album
    {
        private $name;
        private $id;


        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }


        function setName()
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function getId()
        {
            return $this->id;
        }


        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO albums (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }


        static function getAll()
        {
            $returned_records = $GLOBALS['DB']->query("SELECT * FROM albums;");
            $records = array();
            foreach($returned_records as $record) {
                $name = $record['name'];
                $id = $record['id'];
                $new_record = new Album($name, $id);
                array_push($records, $new_record);
            }
            return $records;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM albums;");
        }
    }
?>
