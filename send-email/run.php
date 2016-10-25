<?php
$apiKey = $_SERVER['SEND_GRID_API_KEY'];
$message = $_SERVER['message'];
echo "API KEY: " . $apiKey;
echo "Messagfile: " . $message;
echo "Content:";
print_r (file_get_contents(json_decode($message)));
$res= '{"to": "ori@platform.sh","from": "ori@platform.sh","subject": "test","text": "test"}';
file_put_contents($message, $res);
echo "Content After Write:";
$resp = json_decode(file_get_contents($message));
var_dump($resp);
/*
$api = 'https://api.sendgrid.com/v3/mail/send';
$apiKey = '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';
$request = null;
$url = null;
$project = null;
$payload = null;
$environment = null;
$machine_name = null;
 
if (!getenv('req')) {
  throw new \Exception("Invalid request");
}
$request = json_decode(file_get_contents(getenv('req')));
 
if (!property_exists($request, 'project')) {
  throw new \Exception("Invalid project");
}
$project = $request->project;
 
if (!property_exists($request, 'payload')) {
  throw new \Exception("Invalid payload");
}
$payload = $request->payload;
 
if (!property_exists($payload, 'environment')) {
  throw new \Exception("Invalid environment");
}
$environment = $payload->environment;
 
if (!property_exists($environment, 'machine_name')) {
  throw new \Exception("Invalid machine name");
}
$machine_name = $environment->machine_name;
 
$url = sprintf("http://%s-%s.eu.platform.sh", $machine_name, $project);
 
$request_body = '{
  "personalizations": [
    {
      "to": [
        {
          "email": "cedric.derue@gmail.com"
        }
      ],
      "subject": "Deploying apps with Platform.sh and Azure Functions is amazing!",
      "substitutions": {
                                 "-url-": "%s"
                  }
    }
  ],
  "template_id": "d4accd8b-4b02-4d40-bcc3-07e93c3e510e",
  "from": {
    "email": "noreply@platform.sh"
  }
}';
 
$formatted_request_body = sprintf($request_body, $url);
 
$headers = array();
$headers[] = "Content-length: " . strlen($formatted_request_body);
$headers[] = "Content-type: application/json";
$headers[] = "Authorization: Bearer " . $apiKey;
 
try {
    // Generate curl request
    $session = curl_init($api);
    curl_setopt($session, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
    // Tell curl to use HTTP POST
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    // Tell curl that this is the body of the POST
    curl_setopt ($session, CURLOPT_POSTFIELDS, $formatted_request_body);
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
 
    // execute
    curl_exec($session);
    curl_close($session);
}
catch (Exception $ex) {
    throw $ex;
}*/
?>