<?php 
require_once 'DatabaseConnect.php';
require_once 'Page.php';

function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'], ''
    );
  }
  
  define("BASE_URL",  url());

$conn = new DatabaseConnect();

class InfoPage extends Page
{
    public $pageData;
    private $connection;

    public function __construct($id, $conn) {
        $this->connection = $conn;
        $query = "SELECT * FROM pages_infos
                    WHERE id = $id";

        $result = $this->connection->sendQuery($query);
        if($result->num_rows < 1) {
            // not fount 
            echo "no rows";
            die;
        } else {
            $data = [];
            while($pageData = $result->fetch_assoc()) {
                array_push($data, $pageData);
            }
        }

        $this->pageData = $data[0];
    }

    public function buildInfoPage() {
        $head = $this->getHead($this->pageData);
        // $header = $this->getHeader($this->pageData, $this->connection);

    }
}


$newPage = new InfoPage(5, $conn);
$newPage->buildInfoPage();

?>