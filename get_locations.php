<?php

    require 'db.php';

    try {
        //gets database info
        $db = new PDO($dsn, $username, $password);
        //sets database attributes and error handlers
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        //Returns a positive mSQL query identifier on success, or FALSE on error.
        $sth = $db->query("SELECT * FROM markers");
        //Gets and stores all the rows in markers table in location variable
        $locations = $sth->fetchAll();
        //encodes data stored in locations as a json type and prints it
        echo json_encode( $locations );
        //error handling
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>
