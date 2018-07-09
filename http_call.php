<?php
INVIO XML
/*
** azione: test, fattura, nc, ricevuta
** Restituisce xml
** vedi: https://www.fattura24.com/api-documentazione/
*/
function lasap_efattura($azione, $xml){
                
                $efatt_api_key = YOUR_API_KEY;
                
                switch ($azione){
                               
                               // Create map with request parameters
                               
                               case 'test': $azione = '/TestKey'; $params = array ('apiKey' => $efatt_api_key); break;
                               case 'crea': $azione = '/SaveDocument'; $params = array ('apiKey' => $efatt_api_key, 'xml' => $xml);break;
                               
                }
                
                
                
                $api_url = 'https://www.app.fattura24.com/api/v0.3';
                
                // Build Http query using params
                $query = http_build_query ($params);

                // Create Http context details
                $contextData = array ( 
                'method' => 'POST',
                'header' => "Connection: close\r\n".
                            "Content-Length: ".strlen($query)."\r\n",
                'content'=> $query );

                // Create context resource for our request
                $context = stream_context_create (array ( 'http' => $contextData ));
                
                // Read page rendered as result of your POST request
                $result =  file_get_contents (
                  $api_url.$azione,  // page url
                  false,
                  $context);
                

                // Server response is now stored in $result variable so you can process it
                $result = html_entity_decode($result);
                return $result;
}
?>
