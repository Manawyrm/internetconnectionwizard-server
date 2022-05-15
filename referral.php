<?php
file_put_contents("/dev/shm/log.txt", json_encode($_SERVER, JSON_PRETTY_PRINT). "\n" . json_encode($_GET, JSON_PRETTY_PRINT)."\n\n", FILE_APPEND);

require_once(__DIR__ . "/mimedl.php");

/*$cabfile = packCAB("/var/www/default/htdocs/public/refer/download");
downloadCAB($cabfile, "%icw98dir%\\download\\offer.cab");
unlink($cabfile);
*/

downloadMIME("/var/www/default/htdocs/public/refer/download", "%icw98dir%\\download");