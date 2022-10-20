<?php
//Main Tools:https://github.com/Tuhinshubhra/fbvid.git
//Open Source Tools
//Share With Give Credit To Owner
function curl($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_5; en-US) AppleWebKit/534.13 (KHTML, like Gecko) Chrome/9.0.597.15 Safari/534.13");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}
system("clear");
echo "
  _______________    __  ___   _____________    ____ 
 /_  __/ ____/   |  /  |/  /  / ___/_  __/ /   / __ \\
  / / / __/ / /| | / /|_/ /   \\__ \\ / / / /   / /_/ /
 / / / /___/ ___ |/ /  / /   ___/ // / / /___/ ____/ 
/_/ /_____/_/  |_/_/  /_/   /____//_/ /_____/_/  

==================================================
     Tools    :  FB Video Downloader
     GitHub   :  github.com/STLP-TEAM
     Facebook :  Spamming & Termux Learning Point
==================================================
";
echo "\n\n";
echo "[#] Enter Video Url : ";
$v = trim(fgets(STDIN, 1024));
echo "\n\n[#] Enter Video Name To Save As : ";
$name = trim(fgets(STDIN, 1024));
$url = str_replace('www', 'mbasic', $v);
$s = curl($url);
//echo $s;
$vurl = preg_match('/<a href=\"\/video_redirect\/\?src\=(.*?)\"/ims', $s, $matches) ? $matches[1] : null;
$vu = urldecode($vurl);
echo "\n\n[+] Downloading... \n\n\n";
$d = 'wget -O "' . $name . '.mp4" --user-agent="Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.6 (KHTML, like Gecko) Chrome/20.0.1092.0 Safari/536.6" "' . $vu . '" -q --show-progress';
system($d);
echo "\n\n[+] Done.. Saved As : " . $name . ".mp4\n\n";
exit(0);
?>
