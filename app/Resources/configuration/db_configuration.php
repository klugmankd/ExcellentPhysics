<?php
    ORM::configure('mysql:host=*********;dbname=********');
    ORM::configure('username', '******');
    ORM::configure('password', '******');
    ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));