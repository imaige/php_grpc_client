<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: internal_api_template_service.proto

namespace Internal_api_template_service;

require "./proto_models/GPBMetadata/InternalApiTemplateService.php";

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;
// use GPBMetadata\InternalApiTemplateService;

/**
 * A request message containing an image file
 *
 * Generated from protobuf message <code>internal_api_template_service.ImageAnalysisRequest</code>
 */
class ImageAnalysisRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string b64image = 1;</code>
     */
    protected $b64image = '';
    /**
     * Generated from protobuf field <code>string model_name = 2;</code>
     */
    protected $model_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $b64image
     *     @type string $model_name
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\InternalApiTemplateService::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string b64image = 1;</code>
     * @return string
     */
    public function getB64Image()
    {
        return $this->b64image;
    }

    /**
     * Generated from protobuf field <code>string b64image = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setB64Image($var)
    {
        GPBUtil::checkString($var, True);
        $this->b64image = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string model_name = 2;</code>
     * @return string
     */
    public function getModelName()
    {
        return $this->model_name;
    }

    /**
     * Generated from protobuf field <code>string model_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setModelName($var)
    {
        GPBUtil::checkString($var, True);
        $this->model_name = $var;

        return $this;
    }

}
