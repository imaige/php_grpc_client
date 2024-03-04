<?php
require 'vendor/autoload.php';
require './proto_models/Information_superhighway/InformationSuperhighwayServiceClient.php';
require './proto_models/Information_superhighway/ImageAnalysisRequest.php';
require './proto_models/Information_superhighway/StatusReply.php';

use Grpc\ChannelCredentials;
use Google\Protobuf\BytesValue;
use Information_superhighway\InformationSuperhighwayServiceClient;
use Information_superhighway\ImageAnalysisRequest;
use Information_superhighway\StatusReply;

// Set up the gRPC client - note that this channel (rather than $hostname below) defines endpoint URL
//TODO: figure out gRPC auth here, I assume something like createSecure() rather than createInsecure() & pass in certs
$channel = new Grpc\Channel('localhost:50051', [
    'credentials' => ChannelCredentials::createInsecure(),
]);
$hostname = 'a9ffa50f4239140f1a19f8b8e811593a-1537691390.us-east-2.elb.amazonaws.com:80';
$opts = [];
$client = new InformationSuperhighwayServiceClient($hostname, $opts, $channel);

// Convert image to b64
$imageData = file_get_contents('./test_image.jpg');
$imageBase64 = base64_encode($imageData);

// Create a request message
$request = new ImageAnalysisRequest();
$request->setB64Image($imageBase64);
$request->setModelName("custom-model");
// make sure to add any new fields to the .proto file and re-run protoc, see README.md for info

// Call RPC request method on the server
try {
    echo "making request" .  PHP_EOL;
    $call = $client->ImageAiAnalysisRequest($request);
    // Iterate through the stream of responses, which are of type StatusReply
    foreach ($call->responses() as $response) {
        echo "Response from server: " . $response->getMessage() . PHP_EOL;
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}