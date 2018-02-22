<?php

require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'application/json',

    // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
    'Ocp-Apim-Subscription-Key' => 'f643f93555184c6abebb76789b4db033',
);
// b49d369245ed4625a181a234ce3f55b1

$request->setHeader($headers);

$parameters = array(
    'returnFaceId' => 'true',
    'returnFaceLandmarks' => 'false',
    'returnFaceAttributes' => 'age,gender,smile,headPose'
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

$request->setBody('{"url": "https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-9/18402800_1699152703432400_5848790458223157224_n.jpg?oh=6c7021f7155029b0af1b4a48d1e8066b&oe=5B1E4C73"}');
try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>