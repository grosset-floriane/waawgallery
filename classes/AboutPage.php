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

class AboutPage extends Page
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

        $title = $pageData['title'];


        $artworkDescription = $pageData['description'];
        $artistBio = $pageData['artist_bio'];

        $enterWorkLinks = $pageData['enter_links'];

        return "
        <main id=\"main\">
            <h1 class=\"logo\"><a href=\"/\">$logo</a></h1>

            <h2>About the gallery</h2>
            
            <p class=\"abstract\">
                WAAW is a non-profit web gallery who invites 
                artists to collaborate on the creation of 
                web-based art works. Every two and a half 
                months, will open an online exhibition here and an offline 
                one at <a href=\"http://zipcollective.com\">studio .ZIP Collective</a>. 
            </p>

            <nav id=\"secondary-nav\">
                <ul>
                    <li><a href=\"#intro\">             On the importance of web-based art</a></li>
                    <li><a href=\"#aboutWaaw\">         What is WAAW?</a></li>
                    <li><a href=\"#projectPurpose\">    What is the purpose of the project?</a></li>
                    <li><a href=\"#expandingOffline\">  Expanding the digital world into the physical one</a></li>
                    <li><a href=\"#sustainability\">    A word on sustainability</a></li>
                    <li><a href=\"#newsletter\">        Sign up to our newsletter!</a></li>
                    <li><a href=\"#support\">           Support</a></li>
                </ul>
            </nav>

    
            <h3 id=\"intro\">On the importance of web-based art</h3>

            <p>
                After 30 years of fast technological 
                development and exponential content growth,
                the web belongs to our daily narratives 
                and anyone trying to escape it loses their
                credibility as they don’t play the rules 
                of the contemporary social community. Like
                most humans’ creation, the web is one more 
                invention for which we struggle to
                predict and understand the impact that 
                it has and will have on our lives.
            </p>

            <p>
                It is even more important to question the
                 place Internet has in our life here, in Norway
                because it stands as one of the most digitized 
                countries of the world: credit cards
                replace almost completely cash, the FM radio 
                ceased, apps are omnipresent (student
                identifications, transportation cards, etc.) 
                and information moved progressively
                on the net.
            </p>


            <h3 id=\"aboutWaaw\">What is WAAW?</h3>

            <p>
                WAAW is a non-profit web gallery, led by 
                <a href=\"http://florianegrosset.com\">Floriane Grosset</a>, 
                that invites artists to
                create web-based art works and provides 
                technical help. Every two and a half
                months, a new collaboration between the 
                artist and the gallery starts. 
                The result will be exhibited on this 
                 website and at
                <a href=\"zipcollective.com\">.ZIP Collective</a>, 
                an artist collective based in Bergen, Norway.
            </p>


            <h3 id=\"projectPurpose\">What is the purpose of the project?</h3>

            <p>
                The aim of WAAW gallery is to promote 
                and help the creation of quality web-based
                art works. The gallery will give most of its 
                support to young unestablished
                artists based in Norway. The support will 
                take the form of technical coding
                assistance and possibly remuneration that 
                will come from national or regional
                funds. In addition to its local action, 
                WAAW gallery aspires to democratize the
                free access and diffusion of art world 
                wide, and will connect with 
                similar projects internationnally.
            </p>


            <h3 id=\"expandingOffline\">Expanding the digital world into the physical one</h3>

            <p>
                The virtual space is the consequence 
                of actions, social connections and
                production that are anchored and developed 
                offline and with tangible people
                aiming to work and create together. On 
                the other side, due to its omnipresence, the
                technologies we use daily and what is 
                happening online shape our interactions,
                our convictions and our actions. In addition 
                to the impact the web has on us as
                humans, it has important consequences: on 
                the society — f.ex. It has the power
                to create communities but also inequalities; 
                on the structures of power — f.ex. It
                shapes our vision of the world leaders by 
                their actions and the propaganda; and
                on the environment — f.ex. the web is embodied 
                in servers that consume lots of
                energy and demand a high rate of extraction 
                of rare metals.
            </p>

            <p>
                Because of the permanent interrelation 
                of virtual and material, it is important
                to locally recontextualize the works in 
                a physical gallery and question the
                connections that already exist and need 
                to be made between the two worlds we
                have built. Therefore, for each of the 
                online openings, an opening will be given at
                the physical gallery of .ZIP Collective. 
                The artists
                will have to reflect on how the work has 
                to be shown and might include previous
                works that they have made or works from 
                other invited artists that give another
                perspective on similar questions.
            </p>


            <h3 id=\"sustainability\">A word on sustainability</h3>

            <p>
                The gallery space is hosted on a eco-friendly 
                server (<a href=\"https://www.ecowebhosting.co.uk/\">
                https://www.ecowebhosting.co.uk/</a>). The 
                philosophy of the gallery is to encourage a
                sustainable creation from using recycled and
                 borrowed materials, machines and
                tools, to avoid the production of waste and
                 unnecessary flight travels. Therefore,
                the invited artists are mostly Bergen-based
                 and will be encouraged to travel by
                bus or train in the case of exhibitions outside
                 of Bergen. In addition, most of the
                promotion will be communicated online on 
                social media and by email, and only a
                few eco-friendly posters could be printed and
                 hung at .ZIP Collective.
            </p>


            <h3 id=\"support\">Support</h3>

            <p>
                The 2020's program got support 
                 <a href=\"https://www.kulturradet.no/\">Kulturr&aring;det</a>. 
            </p>
            

            <p>
                The WAAW Offline exhibition was kindly supported by 
                 <a href=\"https://www.hamburg.de/bkm/wir-ueber-uns/\">
                    Behörde für Kultur und Medien
                </a> 
                and hosted by 
                <a href=\"http://vorwerkstift.de/\">
                    Galerie 21, Künstler*innenhaus Vorwerk-Stift
                </a>. 
            </p>
            <div class=\"institutions-logos\">
                <a href=\"https://www.kulturradet.no/\">
                    <img src=\"assets/img/kulturraadet_sort_stor.png\" class=\"grant-logo\">
                </a>
                <a href=\"https://www.hamburg.de/bkm/wir-ueber-uns/\">
                    <img src=\"assets/img/Behoerde-sw.png\" class=\"grant-logo\">
                </a>
                <a href=\"http://vorwerkstift.de/\">
                    <img src=\"assets/img/Logo_Galerie_21.jpg\" class=\"grant-logo\">
                </a>
            </div>

                


            <section id=\"newsletter\">
                <!--JB Tracker--> <script type=\"text/javascript\"> var _paq = _paq || []; (function(){ if(window.apScriptInserted) return; _paq.push(['clientToken', 'P%2bsIjEMd6oQ%3d']); var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.async=true; g.defer=true; g.src='https://prod.benchmarkemail.com/tracker.bundle.js'; s.parentNode.insertBefore(g,s); window.apScriptInserted=true;})(); </script> <!--/JB Tracker--> <!-- BEGIN: Benchmark Email Signup Form Code -->
                <script type=\"text/javascript\" id=\"lbscript1632457\" src=\"https://lb.benchmarkemail.com//code/lbformnew.js?mFcQnoBFKMRx327Flsq%252BILJ25jqXIyRILxiES2fVdRFOhY%252FIBFwtog%253D%253D\"></script><noscript>Please enable JavaScript <br /><div align=\"center\" style=\"padding-top:5px;font-family:Arial,Helvetica,sans-serif;font-size:10px;color:#999999;\"><a href=\"https://www.benchmarkemail.com/email-marketing?utm_source=usersignupforms&utm_medium=customers&utm_campaign=usersignupforms\" target=\"_new\" style=\"text-decoration:none;font-family:Arial,Helvetica,sans-serif;font-size:10px;color:#999999;\">Email Marketing </a> by Benchmark</div></noscript>
                <!-- END: Benchmark Email Signup Form Code -->


                <p>To keep updated about our upcomming exhibition or get more information, you can 
                    <a href=\"https://www.facebook.com/WAAWgallery/\" target=\"_BLANK\">follow the gallery on Facebook</a>,
                    <a href=\"https://www.instagram.com/waawgallery/\"  target=\"_BLANK\">Instagram</a> 
                    or send an email to 
                    <a href=\"mailto:contact@waawgallery.com\">contact@waawgallery.com</a>
                </p>
            </section>

        </main>
        ";
    }

    public function buildContactPage() {
        $head = $this->getHead($this->pageData);
        $skipLink = $this->getSkipLinkToContent();
        $header = $this->getHeader($this->pageData, $this->connection);
        $content = $this->getInfoContent($this->pageData);
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