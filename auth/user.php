<?php
class User
{

    // database connection and table name

    private $conn;
    private $table_name = "users";

    // object properties

    public $id;
    public $email;
    public $password;
    public $created;

    // constructor with $db as database connection

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // signup user

    function signup()
    {
        if ($this->isAlreadyExist()) {
            return false;
        }

        // query to insert record

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    email=:email, password=:password, created=:created";

        // prepare query

        $stmt = $this->conn->prepare($query);

        // sanitize

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->created = htmlspecialchars(strip_tags($this->created));

        // bind values

        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":created", $this->created);

        // execute query

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // login user
    function login()
    {
        // select all query
        $query = "SELECT *
                FROM
                    " . $this->table_name . " 
                WHERE
                    users_email='" . $this->email . "' AND password='" . $this->password . "'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function checkEmail()
    {
        $query = "SELECT COUNT(`users_id`) AS `is_email_found`
                FROM
                    " . $this->table_name . " 
                WHERE
                    users_email='" . $this->email . "'";
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data["is_email_found"] == 1) {
            return true;
        }
        return false;
    }


    function isAlreadyExist()
    {
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                users_email='" . $this->email . "'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
