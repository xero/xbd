<?php
/*
$Id: v 1.402 2012/03/20 08:06:00 $

<XBD, Extended Browser Detection.>
Copyright (C) <2009>  <Guillermo Azurdia, www.nopticon.com>
Forked    (F) <2012>  <xero harrison, xero.nu>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

forked by xero harrison for use in the open qoob framework.
by forked i mean: wrapped into a class, added android detection
and ip / hostname lookup.
https://github.com/fontvirus/xbd
*/

// -----------------------------------------------------------------------------------
// NOTES:
//
//
// This library also can handle browser detection of cellphones,
// basic spiders and games consoles!
//
// Cellphones: Nokia, Motorola, Samsung, Sony Ericsson, Blackberry, iPhone and HTC.
// Game consoles: Wii and Playstation
//
// If you need to detect IE, when calling the function must use "msie".
// ("ie" won't work.)
//
// 'version_compare' function is used so you can use the same operator syntax
// http://www.php.net/manual/en/function.version-compare.php
//
// The possible operators are: <, lt, <=, le, >, gt, >=, ge, ==, =, eq, !=, <>, ne respectively.
//
// * XBD 1.1 *
// ==
// 
// After a request by email about how to detect OS X version, I've added
// a new argument to return array data based on first argument.
// -----------------------------------------------------------------------------------


?>
<html>
<head>
	<title>xbd : extended browser data</title>
	<style type="text/css">
	body {
		background: #000;
		color: #fff;
	}
	.row {
		width: 80%;
		margin: 0 auto;
		clear: both;
		border: 1px solid #000;
		height: auto;
		min-height: 30px;
	}
	.col1 {
		width: 25%;
		background: #333;
		padding: 5px;
		float: left;
		height: auto;
		min-height: 20px;		
	}
	.col2 {
		width: 73%;
		background: #666;
		padding: 5px;
		float: left;
		height: auto;
		min-height: 20px;		
	}
	</style>
</head>
<body>
<?
//include and init
require('xbd.php');
$x = new xbd();

//---current
$info = $x->browser();
echo '<div class="row"><h1>your browser</h1></div>';
echo '<div class="row"><div class="col1">browser</div><div class="col2">'.$info['browser'].'</div></div>';
echo '<div class="row"><div class="col1">platform</div><div class="col2">'.$info['platform'].'</div></div>';
echo '<div class="row"><div class="col1">version</div><div class="col2">'.$info['version'].'</div></div>';
echo '<div class="row"><div class="col1">type</div><div class="col2">'.$info['type'].'</div></div>';
echo '<div class="row"><div class="col1">useragent</div><div class="col2">'.$info['useragent'].'</div></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';

//---fake android ua
$_SERVER["HTTP_USER_AGENT"] = 'mozilla/5.0 (linux; u; android 2.3.7; en-us; desire hd build/gri40) applewebkit/533.1 (khtml, like gecko) version/4.0 mobile safari/533.1';
$info = $x->browser();
echo '<div class="row"><h1>android</h1></div>';
echo '<div class="row"><div class="col1">browser</div><div class="col2">'.$info['browser'].'</div></div>';
echo '<div class="row"><div class="col1">platform</div><div class="col2">'.$info['platform'].'</div></div>';
echo '<div class="row"><div class="col1">version</div><div class="col2">'.$info['version'].'</div></div>';
echo '<div class="row"><div class="col1">type</div><div class="col2">'.$info['type'].'</div></div>';
echo '<div class="row"><div class="col1">useragent</div><div class="col2">'.$info['useragent'].'</div></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';

//---fake iphone ua
$_SERVER["HTTP_USER_AGENT"] = 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1C25 Safari/419.3';
$info = $x->browser();
echo '<div class="row"><h1>iphone</h1></div>';
echo '<div class="row"><div class="col1">browser</div><div class="col2">'.$info['browser'].'</div></div>';
echo '<div class="row"><div class="col1">platform</div><div class="col2">'.$info['platform'].'</div></div>';
echo '<div class="row"><div class="col1">version</div><div class="col2">'.$info['version'].'</div></div>';
echo '<div class="row"><div class="col1">type</div><div class="col2">'.$info['type'].'</div></div>';
echo '<div class="row"><div class="col1">useragent</div><div class="col2">'.$info['useragent'].'</div></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';

//---fake chrome ua
$_SERVER["HTTP_USER_AGENT"] = 'mozilla/5.0 (windows nt 6.1; wow64) applewebkit/535.11 (khtml, like gecko) chrome/17.0.963.79 safari/535.11';
$info = $x->browser();
echo '<div class="row"><h1>chrome</h1></div>';
echo '<div class="row"><div class="col1">browser</div><div class="col2">'.$info['browser'].'</div></div>';
echo '<div class="row"><div class="col1">platform</div><div class="col2">'.$info['platform'].'</div></div>';
echo '<div class="row"><div class="col1">version</div><div class="col2">'.$info['version'].'</div></div>';
echo '<div class="row"><div class="col1">type</div><div class="col2">'.$info['type'].'</div></div>';
echo '<div class="row"><div class="col1">useragent</div><div class="col2">'.$info['useragent'].'</div></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';

//---fake ie ua
$_SERVER["HTTP_USER_AGENT"] = 'mozilla/4.0 (compatible; msie 7.0; windows nt 6.1; wow64; trident/5.0; slcc2; .net clr 2.0.50727; .net clr 3.5.30729; .net clr 3.0.30729; media center pc 6.0; .net4.0c; .net4.0e)';
$info = $x->browser();
echo '<div class="row"><h1>internet explorer</h1></div>';
echo '<div class="row"><div class="col1">browser</div><div class="col2">'.$info['browser'].'</div></div>';
echo '<div class="row"><div class="col1">platform</div><div class="col2">'.$info['platform'].'</div></div>';
echo '<div class="row"><div class="col1">version</div><div class="col2">'.$info['version'].'</div></div>';
echo '<div class="row"><div class="col1">type</div><div class="col2">'.$info['type'].'</div></div>';
echo '<div class="row"><div class="col1">useragent</div><div class="col2">'.$info['useragent'].'</div></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';

//---fake ipv4
$_SERVER["REMOTE_ADDR"] = '207.97.227.239';
$info = $x->browser();
echo '<div class="row"><h1>ip v6</h1></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';

//---fake ipv6
$_SERVER["REMOTE_ADDR"] = '2001:470:0:64::2';
$info = $x->browser();
echo '<div class="row"><h1>ip v6</h1></div>';
echo '<div class="row"><div class="col1">ip</div><div class="col2">'.$info['ipaddress'].'</div></div>';
echo '<div class="row"><div class="col1">hostname</div><div class="col2">'.$info['hostname'].'</div></div>';
echo '<br/><br/>';


?>
</body>
</html>