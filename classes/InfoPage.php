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

class InfoPage extends Page
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

    public function getInfoContent($pageData) {

        $logo = $this->getLogo();

        $artworkTitle = $pageData['title'];

        $facebookEventUrl = $pageData['facebook_event'];
        $facebookEventLine = "<p><a href=\"$facebookEventUrl\" target=\"_BLANK\">Facebook event</a></p>";

        $eventDate = $pageData['event_date'];
        $eventDateLine = "<p>$eventDate</p>";

        $artworkDescription = $pageData['description'];
        $artistBio = $pageData['artist_bio'];

        $enterWorkLinks = $pageData['enter_links'];

        return "
        <main id=\"main\">
            <h1 class=\"logo\"><a href=\"/\">$logo</a></h1>
            <h2 aria-label=\"$artworkTitle\">$artworkTitle</h2>
            $eventDateLine
            $facebookEventLine
            <hr>
                <section class=\"artwork-intro\">
                    $artworkDescription
                </section>
            <hr>
                <section class=\"artist-bio\">
                    $artistBio
                </section>

                $enterWorkLinks

        </main>
        ";
    }

    public function buildInfoPage() {
        $head = $this->getHead($this->pageData);
        $skipLink = $this->getSkipLinkToContent();
        $header = $this->getHeader($this->pageData, $this->connection);
        $content = $this->getInfoContent($this->pageData);
        $footer = $this->getFooter();

        // var_dump($this->pageData);

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