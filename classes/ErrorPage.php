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

class ErrorPage extends Page
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

    public function getInfoContent($pageData, $error) {

        $logo = $this->getLogo();

        switch($error) {
            case 404:
                $pageTitle = "404 - Not Found";
                $pageContent = "<p>We can't find the page you are looking for. 
                Please check the url.</p><p> Otherwise, you may find the page you are looking for in the list below:</p>";
                break;
            case 403:
                $pageTitle = "403 - Forbidden";
                $pageContent = "<p>You don't have the permission to access this page.<br> 
                You may find the page you are looking for in the list below.</p>";
                break;
            case 500:
                $pageTitle = "500 - Internal server error";
                $pageContent = "<p>An error occured on our server.
                Please try again later.</p><p>You may contact us at <a href=\"mailto:contact@waawgallery.com\">contact@waawgallery.com</a> if the error persists.</p>";
                break;
            default:
                $pageTitle = "An error occurred";
                $pageContent = "<p>An error occured, either on our server or from you request.<br> 
                Please try again later. Otherwise you may find useful the links below.</p>";
                break;
        }

        $menu = $this->getMenu($pageData['artwork_folder']);
        

        return "
        <main id=\"main\" class=\"error-pages\">
            <h1 class=\"logo\"><a href=\"/\">$logo</a></h1>

            <h2>$pageTitle</h2>
            
            $pageContent
            <nav class=\"sitemap\">
                $menu
            </nav>


        </main>
        ";
    }

    public function buildErrorPage($error) {
        $head = $this->getHead($this->pageData);
        $skipLink = $this->getSkipLinkToContent();
        $header = $this->getHeader($this->pageData, $this->connection);
        $content = $this->getInfoContent($this->pageData, $error);
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