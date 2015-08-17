<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Album.php";

    $server = 'mysql:host=localhost;dbname=records_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AlbumTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Album::deleteAll();
        }

        function test_save()
        {
            $album = "Our Secret World";
            $test_album = new Album($album);

            $test_album->save();

            $result = Album::getAll();
            $this->assertEquals($test_album, $result[0]);
        }

        function test_getAll()
        {
            $album = "Our Secret World";
            $album2 = "One Big Particular Loop";
            $test_Album = new Album($album);
            $test_Album->save();
            $test_Album2 = new Album($album2);
            $test_Album2->save();

            $result = Album::getAll();

            $this->assertEquals([$test_Album, $test_Album2], $result);
        }

        function test_deleteAll()
        {
            $album = "Our Secret World";
            $album2 = "One Big Particular Loop";
            $test_Album = new Album($album);
            $test_Album->save();
            $test_Album2 = new Album($album2);
            $test_Album2->save();

            Album::deleteAll();

            $result = Album::getAll();
            $this->assertEquals([], $result);
        }
    }

?>
