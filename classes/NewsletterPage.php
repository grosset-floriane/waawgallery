<?php 
require_once __DIR__ . '/DatabaseConnect.php';
require_once __DIR__ . '/Page.php';

function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'], ''
    );
  }
  
  define("BASE_URL",  url());

$conn = new DatabaseConnect();

class NewsletterPage extends Page
{
    public $pageData;
    private $connection;

    public function __construct($folderName, $conn) {
        $this->connection = $conn;
        $query = "SELECT * FROM pages_infos
                    WHERE artwork_folder LIKE '$folderName'";

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

    public function getInfoContent($pageData, $page) {

        $logo = $this->getLogo();
        if($page === 'confirmation') {
            $pageTitle = "You're subscribed to our newsletter!";
            $pageContent = "
                <p>Your email is now in our database and you will receive our newsletters!</p>
                <p><a href=\"https://waawgallery.com\">Back to WAAW home page</a></p>
            ";
        } else {
            $pageTitle = "One last step to subscribe to our newsletter";
            $pageContent = "
                <p>Please confirm your email via the confirmation link you will receive shortly in your mailbox.</p>
                <p><a href=\"https://waawgallery.com\">Back to WAAW home page</a></p>
            ";
        }

        return "
        <main id=\"main\" class=\"newsletter-pages\">
            <h1 class=\"logo\"><a href=\"/\">$logo</a></h1>

            <h2>$pageTitle</h2>
            
            $pageContent

        </main>
        ";
    }

    public function buildNewsletterPage($page) {
        $head = $this->getHead($this->pageData);
        $skipLink = $this->getSkipLinkToContent();
        $header = $this->getHeader($this->pageData, $this->connection);
        $content = $this->getInfoContent($this->pageData, $page);
        $footer = $this->getFooter();


        echo "

<!DOCTYPE html>
<html lang=\"en\">
        <head>
        $head
        </head>
        $skipLink
        <body class=\"info\">
            $header
            $content
            $footer

        ";

    }

    
}

?>