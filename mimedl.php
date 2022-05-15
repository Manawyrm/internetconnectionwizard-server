<?php
/* 
The Internet Connection Wizard (ICW) will do an HTTP request to the referral.dll,
which will reply with a MIME multipart/mixed answer.
Yes, really the same MIME multipart/mixed format like it's used for 
e-mail attachments. 

Then all required files are just sent one after the other.
Content-Disposition: inline will cause ICW to try and process the file
Content-Disposition: attachment will cause ICW to just store the file

Files marked inline will be handled in a number of different ways,
.cab files will be extracted, .exe files will be executed (yes, again, really...)
and most other formats will just get shell executed as well
(so you'll get the default action). 

There are 2 ways to send the required info to the wizard:
- in a .cab archive
- as single files

The single .cab archive method (.cab then being marked as inline, 
so ICW will extract it) only seems to be supported by newer Windows versions.

The single files method (via MIME) was the original way and should
be compatible with almost all versions of ICW.

All of this was only ever tested against Windows XP SP3 (de-DE, 1031 locale),
so there might be other bugs/problems with other versions of Windows.

Anyway: These functions downloadCAB and downloadMIME implement the two
different ways to send the files to ICW, with downloadMIME being used
for now. 

All of this will also require a webserver that doesn't do any fancy tricks
like HTTP/1.1 chunked transfer. The very simple HTTP client in ICW can't handle
any of that. When using an Apache2 webserver, the "SetEnv downgrade-1.0" rule
in the included .htaccess file will disable all such mechanisms.
Make sure your vhost is using "AllowOverride all".
If you're using a different webserver, please update this file accordingly ;)

The cab approach also requires "lcab" to be installed on the system, 
it's a pretty old utility, but debian still includes it as the "lcab" package.
*/
function packCAB($dir)
{
	$oldcwd = getcwd();

	$cab = tempnam("/tmp/", "offer");
	unlink($cab);
	$cab .= ".cab";

	chdir($dir);
	exec("lcab * " . escapeshellarg($cab));

	chdir($oldcwd);

	return $cab;
}

function downloadCAB($cabfile, $name)
{
	// We need to provide a correct Content-Length header that includes
	// all the bytes, including the MIME headers, etc. 
	// This is a bit annoying, but without it the progress bar won't work.
	// This also has the downside of loading all files into memory, 
	// but that should be OK, as the files are then loaded via Dial-Up ;)
	$data = "";

	$data .= "This should be ignored.\r\n";
	$data .= "--miaumiaumiau\r\n";
	$data .= "Content-Type: application/vnd.ms-cab-compressed\r\n";
	$data .= 'Content-Disposition: inline; filename="'.$name.'"' . "\r\n";
	$data .= 'Content-Length: ' . filesize($cabfile) . "\r\n\r\n";

	$data .= file_get_contents($cabfile);
	$data .= "\r\n--miaumiaumiau--\r\n";

	header('Content-Length: ' . strlen($data));
	header('Content-Type: multipart/mixed; boundary=miaumiaumiau');
	echo $data;
}

function downloadMIME($folder, $prefix)
{
	// We need to provide a correct Content-Length header that includes
	// all the bytes, including the MIME headers, etc. 
	// This is a bit annoying, but without it the progress bar won't work.
	// This also has the downside of loading all files into memory, 
	// but that should be OK, as the files are then loaded via Dial-Up ;)
	$data = "";
	$data .= "This should be ignored.\r\n";

	$folder = rtrim(realpath($folder), "/");
	$it = new RecursiveDirectoryIterator($folder, FilesystemIterator::KEY_AS_PATHNAME | 
												  FilesystemIterator::CURRENT_AS_FILEINFO | 
												  FilesystemIterator::SKIP_DOTS);
	foreach(new RecursiveIteratorIterator($it) as $file)
	{
		// Yeah, this is a bit iffy. If you're using symlinks or your system
		// doesn't use / as the directory seperator, this'll break horribly.
		$filename = str_replace($folder . "/", "", $file->getPathname());

		$dispositionname = $prefix . "\\" .  str_replace('/', "\\", $filename);
		$localname = $folder . "/" . $filename;

		$data .= "--miaumiaumiau\r\n";
		$data .= "Content-Type: ".mime_content_type($localname)."\r\n";
		$data .= 'Content-Disposition: attachment; filename="'.$dispositionname.'"' . "\r\n";
		$data .= 'Content-Length: ' . filesize($localname) . "\r\n\r\n";

		$data .= file_get_contents($localname);
	}
	$data .= "\r\n--miaumiaumiau--\r\n";

	header('Content-Length: ' . strlen($data));
	header('Content-Type: multipart/mixed; boundary=miaumiaumiau');
	echo $data;
}
