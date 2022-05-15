<?php
file_put_contents("/dev/shm/log.txt", json_encode($_SERVER, JSON_PRETTY_PRINT). "\n" . json_encode($_GET, JSON_PRETTY_PRINT)."\n\n", FILE_APPEND);

require_once(__DIR__ . "/mimedl.php");
require_once(__DIR__ . "/config.php");

// Generate the ispinfo.csv file
$fp = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');

fputcsv($fp, [
	"ISPName",
	"OfferID",
	"ISPLogoPath",
	"ISPMarketingHTMPath",
	"ISPTierLogoPath",
	"ISPTeaserPath",
	"ISPFilePath",
	"CfgFlag",
	"RequiredUserInputFlags",
	"BillingFormPath",
	"PayCSVPath",
	"OfferGUID",
	"Mir",
	"LCID"
], ",", "'", "\\");

foreach ($isps as $isp)
{
	fputcsv($fp, $isp, ",", "'", "\\");
}

rewind($fp);
$output = stream_get_contents($fp);
// We need Windows line endings (\r\n) not Unix line endings (\n)...
$output = str_replace("\n", "\r\n", $output);

fclose($fp);

// Yes, in theory this is an issue when multiple connections are happening at the same time. 
file_put_contents(__DIR__ . "/download/ispinfo.csv", $output);

// This is the newer (Windows XP+ ?) mechanism by packing everything
// into a .cab file and only sending that
/*$cabfile = packCAB("/var/www/default/htdocs/public/refer/download");
downloadCAB($cabfile, "%icw98dir%\\download\\offer.cab");
unlink($cabfile);
*/

// This is the classic mechanism, sending everything as seperate files
downloadMIME("/var/www/default/htdocs/public/refer/download", "%icw98dir%\\download");