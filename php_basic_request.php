<?php
require 'vendor/autoload.php'; // Make sure to include the autoload file
require './proto_models/internal_api_template_service/InternalApiTemplateServiceClient.php';
require './proto_models/internal_api_template_service/TemplateRequest.php';
require './proto_models/internal_api_template_service/TemplateReply.php';
require './proto_models/internal_api_template_service/ImageRequest.php';
require './proto_models/internal_api_template_service/ImageReply.php';


use Grpc\ChannelCredentials;
use Google\Protobuf\BytesValue;
use Internal_api_template_service\InternalApiTemplateServiceClient;
use Internal_api_template_service\TemplateRequest;
use Internal_api_template_service\TemplateReply;
use Internal_api_template_service\ImageRequest;
use Internal_api_template_service\ImageReply;

// Set up the gRPC client
$channel = new Grpc\Channel('localhost:50051', [
    'credentials' => ChannelCredentials::createInsecure(),
]);
$hostname = 'localhost:50051';
$opts = [];
$client = new InternalApiTemplateServiceClient($hostname, $opts, $channel);

// Convert image to b64
$imageData = file_get_contents('./test_image.jpg');
$imageBase64 = base64_encode($imageData);

// Create a TemplateRequest
// $request = new TemplateRequest();
// $request->setName("calebtest");

// Create a request message
$request = new ImageRequest();
$request->setB64Image($imageBase64);
//$request->setText($text);

// Call the RPC method on the server
try {
    $call = $client->InternalApiTemplateImageRequest($request);
    // Iterate through the stream of TemplateReply messages
    foreach ($call->responses() as $response) {
        // echo "Response from server: " . $response->getMessage() . PHP_EOL;
        // echo "Response from server: " . $response->getb64image() . PHP_EOL;
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}