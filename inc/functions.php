<?php 


function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}


function printMetaTags($data) {
    if (empty($data)) {return;}

    $title = $data["title"];
    $artworkFolder = $data["artwork_folder"];
    $imageUrl = $data["image"];
    $imageAlt = $data["image_alt"];
    $shortDescription = $data["short_description"];

    echo "
    <meta name=\"author\" content=\"Floriane Grosset\">
    <meta name=\"robots\" content=\"index, follow\">
    <meta property=\"og:title\" content=\"$title\" />
    <meta property=\"og:url\" content=\"https://waawgallery.com$artworkFolder\" />
    <meta property=\"og:image\" content=\"$imageUrl\" />
    <meta property=\"og:image:alt\" content=\"$imageAlt\" />
    <meta property=\"og:image:width\" content=\"820\" />
    <meta property=\"og:image:height\" content=\"630\" />
    <meta property=\"og:type\" content=\"article\" />
    <meta property=\"og:description\" content=\"$shortDescription\" />
    <meta property=\"og:locale\" content=\"en_US\" />
    
    <!-- Twitter cards -->
    <meta name=\"twitter:card\" content=\"summary_large_image\">
    <meta name=\"twitter:site\" content=\"@FlosWebdesign\">
    <meta name=\"twitter:creator\" content=\"@FlosWebdesign\">
    <meta name=\"twitter:title\" content=\"$title\">
    <meta name=\"twitter:description\" content=\"$shortDescription\">
    <meta name=\"twitter:image\" content=\"$imageUrl\">
    <meta name=\"twitter:image:alt\" content=\"$imageAlt\">
    
    ";
}

?>
