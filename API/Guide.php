<?php

class Guide
{
   public $api_key = 'NHA5bWo4MlBUbDFCV1N5YTdiZnBVX05tOHUwN2hrY0I6';

   function searchGuide($class = '',$specialization = '')
   {

   		$curl = curl_init();

   		curl_setopt_array($curl, array(
   		  CURLOPT_URL => "http://127.0.0.1/raid/web/index.php?r=guide%2Fsearch&class=$class&specialization=$specialization",
   		  CURLOPT_RETURNTRANSFER => true,
   		  CURLOPT_ENCODING => "",
   		  CURLOPT_MAXREDIRS => 10,
   		  CURLOPT_TIMEOUT => 30,
   		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   		  CURLOPT_CUSTOMREQUEST => "GET",
   		  CURLOPT_HTTPHEADER => array(
   		    "authorization: Basic ".$api_key,
   		    "cache-control: no-cache",
   		    "postman-token: 8fb9f45c-14f1-2482-a7fc-4dc79bd7b955"
   		  ),
   		));

   		$response = curl_exec($curl);
   		$err = curl_error($curl);

   		curl_close($curl);

   		return "halo2";
   		if ($err) 
   		{
   		  return NULL;
   		} 
   		else 
   		{
   		  return($response);
   		}	
     
   }   
}