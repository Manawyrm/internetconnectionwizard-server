<?php
require_once(__DIR__ . "/config_header.php");

$isps = []; 

// IMPORTANT! The "ISPName" field is _REQUIRED_ to have a space in it.
// Otherwise, it won't be encapsulated in single-quotes and the wonky
// csv-parser in ICW will trip over that.
$isps[] = [
	"ISPName" => 'tbspace Networks', 
	"OfferID" => count($isps) + 1, 
	"ISPLogoPath" => "download/tbspace/tbspace.gif", 
	"ISPMarketingHTMPath" => "download/tbspace/tbspace.htm", 
	"ISPTierLogoPath" => "download/tbspace/tbspace.gif", 
	"ISPTeaserPath" => "download/tbspace/tbspace.htm", 
	"ISPFilePath" => "download/tbspace/tbspace.isp", 
	"CfgFlag" => CFGFLAG_OFFERS | CFGFLAG_AUTOCONFIG | CFGFLAG_SIGNUP_PATH | CFGFLAG_USERINFO, 
	"RequiredUserInputFlags" => USERINPUT_FE_NAME | USERINPUT_FIRSTNAME | USERINPUT_LASTNAME | USERINPUT_ADDRESS | USERINPUT_MOREADDRESS | USERINPUT_CITY | USERINPUT_STATE | USERINPUT_ZIP | USERINPUT_PHONE | USERINPUT_COMPANYNAME, 
	"BillingFormPath" => "download/billing.txt", 
	"PayCSVPath" => "download/pay.csv", 
	"OfferGUID" => "11111111-00000-000000000-0", 
	"Mir" => "MIR", 
	"LCID" => 1031
];

$isps[] = [
	"ISPName" => 'Test entry 2',
	"OfferID" => count($isps) + 1,
	"ISPLogoPath" => "download/ico2660/ico2660.gif",
	"ISPMarketingHTMPath" => "download/ico2660/ico2660.htm",
	"ISPTierLogoPath" => "download/ico2660/ico2660.gif",
	"ISPTeaserPath" => "download/ico2660/ico2660.htm",
	"ISPFilePath" => "download/ico2660/ico2660.isp",
	"CfgFlag" => CFGFLAG_OFFERS,
	"RequiredUserInputFlags" => USERINPUT_FE_NAME | USERINPUT_FIRSTNAME | USERINPUT_LASTNAME | USERINPUT_ADDRESS | USERINPUT_MOREADDRESS | USERINPUT_CITY | USERINPUT_STATE | USERINPUT_ZIP | USERINPUT_PHONE | USERINPUT_COMPANYNAME,
	"BillingFormPath" => "download/billing.txt",
	"PayCSVPath" => "download/pay.csv",
	"OfferGUID" => "11111111-00000-000000000-1",
	"Mir" => "MIR",
	"LCID" => 1033
];

