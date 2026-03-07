<?php
    /** From the url get the json file containing all the items to display. */
    function getItems($url) 
    {
       $output = [
            "data" => "",
            "error" => "",
            "errorNum" => 0,
            "httpCode" => 0,
       ];

       // Initialize session
       $ch = curl_init($url);

        // Set options for operation
        $options = [
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        ];
        curl_setopt_array($ch, $options);

        // Execute request
        $response = curl_exec($ch);

        // Check for Connection Errors (DNS, Timeout, Refused)
        $errorNum = curl_errno($ch);
        $output["errorNum"] = $errorNum;
        if ($errorNum) 
        {
            $errorMsg = curl_error($ch);
            $output["error"] = "Network error ($errorNum): $errorMsg";
            return $output;
        }

        // If curl geve no errors it means that the server was reached.
        // we still want to make sure that the page exists and the server is fine.
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $output["httpCode"] = $httpCode;
        if ($httpCode >= 400) { 
            $output["error"] = "HTTP Error: $httpCode";
            return $output;
        }

        // Decode the data as JSON
        $data = json_decode($response);
        $output["data"] = $data;
        if (!$data) {
            $output["error"] = "JSON parsing error";
        }
        return $output;
    }
?>
