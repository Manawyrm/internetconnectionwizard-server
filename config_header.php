<?php
define("CFGFLAG_OFFERS",                     0x00000001);  // 0 = No offer;        1 = offers
define("CFGFLAG_AUTOCONFIG",                 0x00000002);  // 0 = No;              1 = Yes
define("CFGFLAG_CNS",                        0x00000004);  // 0 = No star;         1 = Star
define("CFGFLAG_SIGNUP_PATH",                0x00000008);  // 0 = Jump to Finish;  1 = Continue down sign up path
define("CFGFLAG_USERINFO",                   0x00000010);  // 0 = Hide name/addr;  1 = Show name/addr page
define("CFGFLAG_BILL",                       0x00000020);  // 0 = Hide bill        1 = Show bill page
define("CFGFLAG_PAYMENT",                    0x00000040);  // 0 = Hide payment;    1 = Show payment page
define("CFGFLAG_SECURE",                     0x00000080);  // 0 = Not secure;      1 = Secure
define("CFGFLAG_IEAKMODE",                   0x00000100);  // 0 = No IEAK;         1 = IEAK
define("CFGFLAG_BRANDED",                    0x00000200);  // 0 = No branding;     1 = Branding
define("CFGFLAG_SBS",                        0x00000400);  // 0 = No SBS           1 = SBS
define("CFGFLAG_ALLOFFERS",                  0x00000800);  // 0 = Not all offers   1 = All offers
define("CFGFLAG_USE_COMPANYNAME",            0x00001000);  // 0 = Not use          1 = Use company name
define("CFGFLAG_ISDN_OFFER",                 0x00002000);  // 0 = Non-ISDN offer   1 = ISDN offer
define("CFGFLAG_OEM_SPECIAL",                0x00004000);  // 0 = non OEM special offer    1 = OEM special offer
define("CFGFLAG_OEM",                        0x00008000);  // 0 = non OEM offer    1 = OEM offer

define("USERINPUT_FE_NAME",                        0x00000001);
define("USERINPUT_FIRSTNAME",                      0x00000002);
define("USERINPUT_LASTNAME",                       0x00000004);
define("USERINPUT_ADDRESS",                        0x00000008);
define("USERINPUT_MOREADDRESS",                    0x00000010);
define("USERINPUT_CITY",                           0x00000020);
define("USERINPUT_STATE",                          0x00000040);
define("USERINPUT_ZIP",                            0x00000080);
define("USERINPUT_PHONE",                          0x00000100);
define("USERINPUT_COMPANYNAME",                    0x00000200);
define("USERINPUT_CCNAME",                         0x00000400);
define("USERINPUT_CCADDRESS",                      0x00000800);
define("USERINPUT_CCNUMBER",                       0x00001000);
