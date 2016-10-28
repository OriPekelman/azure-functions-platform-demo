<?php
$platform_deployer_app_url =$_SERVER['DEPLOY_OR_NOT_URL'];
$api = 'https://api.sendgrid.com/v3/mail/send';

$res = new stdClass();
$to = new stdClass();
$from = new stdClass();
$cont_element = new stdClass();
 
function autolink($str) {
  $str = ' ' . $str; 
  $str = preg_replace('`([^"=\'>])((http|https)://[^\s<]+[^\s<\.)])`i', '$1<a  href="$2">$2</a>',$str);
  $str = substr($str, 1);
  return $str;
}

if (!getenv('req')) {
  throw new \Exception("Invalid request");
}
 
if (!property_exists($request, 'project')) {
  throw new \Exception("Invalid project");
}
 
if ($request->type!="environment.branch"){
  throw new \Exception("Only Supporting Branching for the moment");
}
 
$request = json_decode(file_get_contents(getenv('req')));
$project = $request->project;
$environment = $request->parameters->environment;
$log = autolink($request->log);

$content = str_replace("{{deploy_or_not_url}}", $platform_deployer_app_url ."?project=".$project . "&environment=".$environment ,file_get_contents("template.html"));
$content = str_replace("{{environment}}", $request->parameters->environment,$content);
$content = str_replace("{{parent}}", $request->parameters->environment,$content);
$content = str_replace("{{log}}", $log, $content);

$to->name="DeployOrNot";
$to->email="ori+test@platform.sh";
$from->name="DeployOrNot";
$from->email="noreply@platform.sh";

$res->to = $to;
$res->from = $from;

$res->subject = "Deploying apps with Platform.sh and Azure Functions is amazing!";
$res->text=$res->subject;

$cont_element->type="text/html";
$cont_element->value=$content;
$res->content=[$cont_element];

$res =  json_encode($res);

file_put_contents($_SERVER['message'], $res);
