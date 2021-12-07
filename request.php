<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.nbrb.by/api/exrates/rates/'. $_GET["query"]);
curl_exec($curl);
