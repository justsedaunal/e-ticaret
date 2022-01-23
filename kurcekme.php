<?php

$connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');

$usd_selling = $connect_web->Currency[0]->BanknoteSelling;

$USD = $usd_selling ;


?>

