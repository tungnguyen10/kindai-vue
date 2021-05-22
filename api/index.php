<?php 

/** Loads Environment */
require('./config.php');
require('./generate.php');
use Utils\RandomStringGenerator;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

date_default_timezone_set('Asia/Tokyo');

class Database{

    // specify your own database credentials
    private static $instance = null;
    public $conn;

    private function __construct() {
      try{
          $this->conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
          $this->conn->exec("set names utf8mb4");
      } catch(PDOException $exception){
          echo "Connection error: " . $exception->getMessage();
      }
    }

    // get the database connection
    public function getConnection(){
        return $this->conn;
    }

    public static function getInstance()
      {
        if(!self::$instance)
        {
          self::$instance = new Database();
        }

        return self::$instance;
    }
}


class Objects {
  private $conn;
  private $table_name = "options";

  public $id;
  public $options;
  public $requestMethod;

  /**
    Create database
  */
  public function __construct($db){
    try {
      $sql = "CREATE TABLE ".$this->table_name." (
          id VARCHAR(12) NOT NULL PRIMARY KEY,
          options TEXT NOT NULL
          )";

      $this->conn = $db;
      if(!$this->conn->query("DESCRIBE ".$this->table_name)) {
          $this->conn->exec($sql);
      } 
    } catch (Exception $exception) {
      echo "Create table error: " . $exception->getMessage();
    }
  }

  /**
    Create records
  */
  public function create() {
    try {
      $query = "INSERT INTO ". $this->table_name . " SET id=:id, options=:options";

      // prepare query
      $stmt = $this->conn->prepare($query);

      // sanitize
      $this->id=htmlspecialchars($this->id);
      $this->options=json_encode($this->options);

      // bind values
      $stmt->bindParam(":id", $this->id);
      $stmt->bindParam(":options", $this->options);

      // execute query
      if($stmt->execute()){
          return true;
      }

    } catch (Exception $e) {
      return false;
    }
  }

  /**
    Read records
  */
  public function read($id){
    try {
      $query = "SELECT  * from ".$this->table_name . " WHERE id='". htmlspecialchars($id)."'";

      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // execute query
      $stmt->execute();

      return $stmt;

    } catch (Exception $e) {
      return false;
    }
  }

  /**
    Update records
  */
  public function update(){
    try {
      $query = "UPDATE ".$this->table_name . "
          SET
              options = :options
          WHERE
              id = :id";

      // prepare query statement
      $stmt = $this->conn->prepare($query);

      // sanitize
      $this->stream_id=htmlspecialchars($this->id);
      $this->options=json_encode($this->options);

      // bind values
      $stmt->bindParam(":id", $this->id);
      $stmt->bindParam(":options", $this->options);

      // execute the query
      if($stmt->execute()){
          return true;
      }

    } catch (Exception $e) {
      return false;
    }
  }

  /**
    Proccessing condition
  */
  public function processRequest(){
      switch ($this->requestMethod) {
          case 'GET':
            $this->get_data();
            break;
          case 'POST':
            $this->post_data();
            break;
          default:
            http_response_code(404);
            echo json_encode(array("message" => "Page not found."));
            break;
      }
  }

  /**
    Proccessing condition
  */
  public function processing($options) {
    try {
      if ($options){
        // Create string
        $string_tmp = $options->hair->value.$options->top->value.$options->bottom->value.$options->shoes->value
        .(($options->accessories1->value != 0) ? $options->accessories1->value : '') .(($options->accessories2->value != 0) ? $options->accessories2->value : '');
  
        // Create condition
        $condition = ['1' => 'hair', '2' => 'top', '3' => 'bottom', '4' => 'shoes', '5' => 'accessories1', '6' => 'accessories2'];
        $chart_tmp = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0, '6' => 0];
        $temp = ['hair' => 0, 'top' => 0, 'bottom' => 0, 'shoes' => 0, 'accessories1' => 0, 'accessories2' => 0];
  
        // Loop
        for ($i = 1; $i <= 6; $i++) {
          for ($x=0; $x < strlen($string_tmp); $x++) { 
            if(substr($string_tmp, $x,1) == $i)
            {
              $temp[$condition[$i]] += 1;
              $chart_tmp[$i] += 1;
            }
          }
        }
  
        // Build chart
        $chart = [];
        foreach ($chart_tmp as $key => $value) {
          if ($value != 0) {
            $chart[$key] = ($value/strlen($string_tmp))*100;
          }
        }
        
        // Sort value
        arsort($temp);
        
        // proccess result
        $choose_key = array_keys($temp)[0];
        $choose = 0;
        switch ($choose_key) {
          case 'top':
            $choose = $options->top->value;
            break;
          case 'bottom':
            $choose = $options->bottom->value;
            break;
          case 'shoes':
            $choose = $options->shoes->value;
            break;
          case 'accessories1':
            $choose = $options->accessories1->value;
            break;
          case 'accessories2':
            $choose = $options->accessories2->value;
            break;        
          default:
            $choose = $options->hair->value;
            break;
        }
  
        $result = ['key' => $choose_key, 'value' => $choose, 'chart' => $chart];
  
        return $result;
      }
    } catch (\Throwable $th) {
      return null;
    }
    
  }

  /**
    Create new records and update records
  */
  public function post_data() {
    try {
        // Create new instance of generator class.
      $generator = new RandomStringGenerator;

      // Create new ID
      $id = $generator->generate(ID_LENGTH);

      // get posted data
      $data = json_decode(file_get_contents("php://input"));
      
      if (!empty($data->options)) {
        if (empty($data->uuid)){
          $this->id = $id;
          $this->options = $data->options;

          if($this->create()) {
            $stmt = $this->read($id);
            $item = $stmt->fetch();

            $options = array(
              "id"      => $item['id'],
              "options" =>$item['options'],
              "content" => $this->processing(json_decode($item['options']))
            );

            http_response_code(200);
            echo json_encode(array("message" => "Create successfully.", "options" => $options));
          } else {
            http_response_code(503);
            echo json_encode(array("message" => "Create failed."));
          }
        } else {
          $stmt = $this->read($data->uuid);
          $num = $stmt->rowCount();
          if( $num > 0) {
            $row = $stmt->fetch();
            $this->id = $data->uuid;
            $this->options = $data->options;

            if($this->update()) {
              $options = array(
                "id"      => $this->id,
                "options" => $this->options,
                "content" => $this->processing(json_decode($this->options))
              );
                http_response_code(200);
                echo json_encode(array("message" => "Update successfully.", "options" => $options));
            } else {
                http_response_code(503);
                echo json_encode(array("message" => "Update failed."));
            }
          }
        }
        
      }
    } catch (\Throwable $th) {
      http_response_code(404);
      echo json_encode(array("message" => "An error occurred while processing. Please try again later."));
    }
  }

  /**
    Get records with uuid
  */
  public function get_data() {
    try {
      if (isset($_GET['uuid']))
      {
        $stmt = $this->read($_GET['uuid']);
        $item = $stmt->fetch();

        $options = array(
          "id"      => $item['id'],
          "options" => $item['options'],
          "content" => $this->processing(json_decode($item['options']))
        );

        http_response_code(200);
        echo json_encode(array("options" => $options));
      }
    } catch (\Throwable $th) {
      http_response_code(404);
      echo json_encode(array("message" => "An error occurred while processing. Please try again later."));
    }
  }
}


// Call connection
$database = Database::getInstance();
$db = $database->getConnection();

// Create objects
$objects = new Objects($db);
$objects->requestMethod = $_SERVER["REQUEST_METHOD"];
$objects->processRequest();