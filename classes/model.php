<?php
/* 
    Documentation on: 09-10-2019. No this date is not a palindrome.
    This class represents the model of the M-V-C framework. Actual models will need to extend this class.
    Protected properties: 
    1. db => represents the database connection object.
    2. stmt => represents the statement to be executed on the database/table.

    Public methods: 
    1. query($query) => uses the PDO::prepare function to prepare the query string.
    2. bind($param, $value, $type = null) => binds one parameter to the prepared statement.
    $param => string that represents the portion to be replaced in the query string. (Eg.: ':id')
    $value => string that should replace the param. (Eg.: 9993)
    $type => type of the value passed to the function. (Eg.: PARAM_INT)
    3. fetchResult() => Executes the prepared query and returns and returns an associative array of the result. There is only one row that gets returned.
    4. execute() => Executes the prepared query.
    5. resultSet() => Executes the prepared query and returns the an associative array of the result set .
    6. lastInsertId() => returns the id of the last inserted row. (Important: Read Change(06-12-2019) )
    
    The above is pure boilerplate. Probably will not require much modification. Please document any changes made to this class in the section below.
    Changes:
    ---------------------
    Constant
    1. MAX_ENC_REPEAT => the maximum number of times to repeat encryption on the given data by encrypt function. 

    Public methods:
    1. encrypt($data, $times) :array => Encrypts the given data"($data) $times times. Returns an associative array with keys "encrypted", "key" and 
    "vector" representing encrypted data, encryption key and initialization vector respectively.
    Eg.: encrypt("Mysecret Sting Operation",4) will encrypt "Mysecret Sting Operation" 4 times using openssl encryption functions.

    2. decrypt($data, $times, $key, $vector): string => Decrypts given data the specified number of times with the secret key used to encrypt it.
    $data => Encrypted text.
    $times => Number of times the text was encrypted.
    $key => Key that was used to encrypt the string.
    $vector => initialization vector used to encrypt the string.
    
    Change made on 22-10-2019:
    3. randomHash($bytes) => Returns a  cryptographically secure string of characters of length $bytes.
    UPDATED ON  04-11-2019:
    randomHash($bytes) has been changed to: randomHash($len) => Returns a cryptographically secure string of characters of length $len

    The above may need to be moved to a more appropriate class later as it is not always required in all models.
    
    
    Change (6-12-2019):
    query, bind, fetchResult, execute, resultSet, lastInsertId are all now  protected not public.
*/


abstract class Model
{
    protected $db;
    protected $stmt;
    const MAX_ENC_REPEAT = 10; //Arbitrary number to repeat encryption on the given data by encrypt function.
    public function __construct()
    {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    }

    protected function query($query)
    {

        $this->stmt = $this->db->prepare($query);
    }

    protected function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    protected function quote($string,$type){
        if (is_null($type)) {
            switch (true) {
                case is_int($string):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($string):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($string):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        return $this->db->quote($string, $type);
        
    }

    protected function fetchResult()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function execute()
    {
        $this->stmt->execute();
    }

    protected function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function lastInsertId()
    {
        return $this->db->lastInsertId();
    }

    public function randomHash($len)
    {
        $cryptoStrong = true;
        $len = $len / 2;
        //One byte is two characters. openssl_random_pseudo_bytes($bytes) returns $bytes number of bytes.
        return (bin2hex(openssl_random_pseudo_bytes($len, $cryptoStrong)));
    }

    public function encrypt($data, $times): array
    {
        $encrypted = $data;
        $type = "AES-256-CBC";
        $secretKey = $this->randomHash(32);
        $initVec = $this->randomHash(16);
        $times = $times ? $times < $this->MAX_ENC_REPEAT : $this->MAX_ENC_REPEAT;
        for ($i = 0; $i < $times; $i++) {
            $encrypted = openssl_encrypt($encrypted, $type, $secretKey, 0, $initVec);
        }
        return array("encrypted" => $encrypted, "key" => $secretKey, "vector" => $initVec);
    }

    public function decrypt($data, $times, $key, $vector): string
    {
        $decrypted = $data;
        for ($i = 0; $i < $times; $i++) {
            $decrypted = openssl_decrypt($decrypted, $key, $vector);
        }
        return $decrypted;
    }
}
