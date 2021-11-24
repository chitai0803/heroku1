<?php


class DBController
{
    // Database Connection Properties
    protected $host = 'mysql5037.site4now.net';
    protected $user = 'a7c995_heroku';
    protected $password = 'mysql1mysql1';
    protected $database = "db_a7c995_heroku";

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}
