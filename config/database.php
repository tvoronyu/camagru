<?php

namespace Config;

class database
{
    public $DB_HOST;
    public $DB_DSN;
    public $DB_USER;
    public $DB_PASSWORD;

    public function __construct()
    {
        $this->DB_HOST = "camagru.mysql.tools";
        $this->DB_DSN = "camagru_db";
        $this->DB_USER = "camagru_db";
        $this->DB_PASSWORD = "L64QQQCV";
    }
}