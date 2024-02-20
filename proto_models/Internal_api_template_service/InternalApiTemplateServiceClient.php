<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Internal_api_template_service;

/**
 * Template service definition
 */
class InternalApiTemplateServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Basic request
     * @param \Internal_api_template_service\TemplateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function InternalApiTemplateRequest(\Internal_api_template_service\TemplateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/internal_api_template_service.InternalApiTemplateService/InternalApiTemplateRequest',
        $argument,
        ['\Internal_api_template_service\TemplateReply', 'decode'],
        $metadata, $options);
    }

    /**
     * Basic photo request
     * @param \Internal_api_template_service\ImageAnalysisRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ImageAiAnalysisRequest(\Internal_api_template_service\ImageAnalysisRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/internal_api_template_service.InternalApiTemplateService/ImageAiAnalysisRequest',
        $argument,
        ['\Internal_api_template_service\ImageReply', 'decode'],
        $metadata, $options);
    }

}
