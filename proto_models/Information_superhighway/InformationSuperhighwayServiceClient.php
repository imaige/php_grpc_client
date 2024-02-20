<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Information_superhighway;

/**
 * Service definition
 */
class InformationSuperhighwayServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * AI analysis request
     * @param \Information_superhighway\ImageAnalysisRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ImageAiAnalysisRequest(\Information_superhighway\ImageAnalysisRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/information_superhighway.InformationSuperhighwayService/ImageAiAnalysisRequest',
        $argument,
        ['\Information_superhighway\StatusReply', 'decode'],
        $metadata, $options);
    }

}
