<?php

namespace Gcsc\LaravelApiResponse;

use HttpStatusCodes\RFCStatusCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

/**
 * Class ApiResponse.
 *
 * @method JsonResponse continue($data = [], string $message = null)
 * @method JsonResponse switchingProtocols($data = [], string $message = null)
 * @method JsonResponse processing($data = [], string $message = null)
 * @method JsonResponse ok($data = [], string $message = null)
 * @method JsonResponse created($data = [], string $message = null)
 * @method JsonResponse accepted($data = [], string $message = null)
 * @method JsonResponse nonAuthoritativeInformation($data = [], string $message = null)
 * @method JsonResponse noContent($data = [], string $message = null)
 * @method JsonResponse resetContent($data = [], string $message = null)
 * @method JsonResponse partialContent($data = [], string $message = null)
 * @method JsonResponse multiStatus($data = [], string $message = null)
 * @method JsonResponse alreadyReported($data = [], string $message = null)
 * @method JsonResponse imUsed($data = [], string $message = null)
 * @method JsonResponse multipleChoices($data = [], string $message = null)
 * @method JsonResponse movedPermanently($data = [], string $message = null)
 * @method JsonResponse found($data = [], string $message = null)
 * @method JsonResponse seeOther($data = [], string $message = null)
 * @method JsonResponse notModified($data = [], string $message = null)
 * @method JsonResponse useProxy($data = [], string $message = null)
 * @method JsonResponse reserved($data = [], string $message = null)
 * @method JsonResponse temporaryRedirect($data = [], string $message = null)
 * @method JsonResponse permanentRedirect($data = [], string $message = null)
 * @method JsonResponse badRequest($data = [], string $message = null)
 * @method JsonResponse unauthorized($data = [], string $message = null)
 * @method JsonResponse paymentRequired($data = [], string $message = null)
 * @method JsonResponse forbidden($data = [], string $message = null)
 * @method JsonResponse notFound($data = [], string $message = null)
 * @method JsonResponse methodNotAllowed($data = [], string $message = null)
 * @method JsonResponse notAcceptable($data = [], string $message = null)
 * @method JsonResponse proxyAuthenticationRequired($data = [], string $message = null)
 * @method JsonResponse requestTimeout($data = [], string $message = null)
 * @method JsonResponse conflict($data = [], string $message = null)
 * @method JsonResponse gone($data = [], string $message = null)
 * @method JsonResponse lengthRequired($data = [], string $message = null)
 * @method JsonResponse preconditionFailed($data = [], string $message = null)
 * @method JsonResponse payloadTooLarge($data = [], string $message = null)
 * @method JsonResponse uriTooLong($data = [], string $message = null)
 * @method JsonResponse unsupportedMediaType($data = [], string $message = null)
 * @method JsonResponse rangeNotSatisfiable($data = [], string $message = null)
 * @method JsonResponse expectationFailed($data = [], string $message = null)
 * @method JsonResponse imATeapot($data = [], string $message = null)
 * @method JsonResponse misdirectedRequest($data = [], string $message = null)
 * @method JsonResponse unprocessableEntity($data = [], string $message = null)
 * @method JsonResponse locked($data = [], string $message = null)
 * @method JsonResponse failedDependency($data = [], string $message = null)
 * @method JsonResponse tooEarly($data = [], string $message = null)
 * @method JsonResponse upgradeRequired($data = [], string $message = null)
 * @method JsonResponse preconditionRequired($data = [], string $message = null)
 * @method JsonResponse tooManyRequests($data = [], string $message = null)
 * @method JsonResponse requestHeaderFieldsTooLarge($data = [], string $message = null)
 * @method JsonResponse unavailableForLegalReasons($data = [], string $message = null)
 * @method JsonResponse internalServerError($data = [], string $message = null)
 * @method JsonResponse notImplemented($data = [], string $message = null)
 * @method JsonResponse badGateway($data = [], string $message = null)
 * @method JsonResponse serviceUnavailable($data = [], string $message = null)
 * @method JsonResponse gatewayTimeout($data = [], string $message = null)
 * @method JsonResponse versionNotSupported($data = [], string $message = null)
 * @method JsonResponse variantAlsoNegotiates($data = [], string $message = null)
 * @method JsonResponse insufficientStorage($data = [], string $message = null)
 * @method JsonResponse loopDetected($data = [], string $message = null)
 * @method JsonResponse notExtended($data = [], string $message = null)
 * @method JsonResponse networkAuthenticationRequired($data = [], string $message = null)
 */
class ApiResponse
{
    /* Default Response Content */
    protected $code = RFCStatusCodes::HTTP_OK;
    protected $message = '';
    protected $data = [];
    protected $meta = [];
    protected $headers = [];
    protected $options = 0;

    /* Response Configuration */
    protected $includeMessage = true;
    protected $messageKey = 'message';
    protected $includeMeta = true;
    protected $metaKey = 'meta';
    protected $defaultMeta = null;
    protected $dataOnTopLevel = false;
    protected $dataKey = 'data';
    protected $statusCodesClass = RFCStatusCodes::class;

    /**
     * Create a new ApiResponse Instance.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        foreach ($options as $optionKey => $option) {
            if (method_exists($this, Str::camel($optionKey))) {
                $this->${Str::camel($optionKey)}($option);
            }
        }

        $this->meta = $this->generateDefaultMeta();
    }

    public function __call($name, $arguments)
    {
        if (defined($this->statusCodesClass.'::HTTP_'.Str::upper(Str::snake($name)))) {
            $code = (int) constant($this->statusCodesClass.'::HTTP_'.Str::upper(Str::snake($name)));
            // $data
            if (! isset($arguments[0])) {
                $data = null;
            } else {
                $data = $arguments[0];
            }

            // $message
            if (! isset($arguments[1])) {
                $manager = new \HttpStatusCodes\StatusCodeManager();
                $statusCode = $manager->makeStatusCode($code);
                $message = $statusCode->getMessage();
            } elseif (! is_string($arguments[1])) {
                throw new \InvalidArgumentException('Message should type of string');
            } else {
                $message = $arguments[1];
            }

            $this->message = $message;

            return call_user_func_array([$this, 'send'], [$data, $code]);
        }

        throw new \BadMethodCallException('Static method: "'.$name.'" not exists');
    }

    protected function generateDefaultMeta()
    {
        if (is_array($this->defaultMeta)) {
            return $this->defaultMeta;
        }

        if (is_callable($this->defaultMeta)) {
            return (array) ($this->defaultMeta)();
        }

        return [
            'version'     => env('API_VERSION', config('laravel-api-response.api_version', '0')),
            'environment' => app()->environment(),
        ];
    }

    /**
     * @param mixed $data
     * @param int|null $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function send($data = null, ?int $code = null): JsonResponse
    {
        if ($data) {
            $this->setData($data);
        }
        if ($code) {
            $this->setCode($code);
        }

        $responseData = [];

        if ($this->dataOnTopLevel) {
            $responseData = $this->data;
        } else {
            $responseData[$this->dataKey] = $this->data;
        }

        if ($this->includeMeta) {
            $responseData[$this->metaKey] = $this->meta;
        }

        if ($this->includeMessage) {
            $responseData[$this->messageKey] = $this->message;
        }

        return response()->json(
            $responseData,
            $this->code,
            $this->headers,
            $this->options
        );
    }

    /*
     *  * * * * * * * * * * * * * *
     *  Configure response
     *  * * * * * * * * * * * * * *
     * */

    public function includeMessage($includeMessage)
    {
        $this->includeMessage = (bool) $includeMessage;

        return $this;
    }

    public function messageKey(string $messageKey)
    {
        $this->messageKey = $messageKey;

        return $this;
    }

    public function includeMeta($includeMeta)
    {
        $this->includeMeta = (bool) $includeMeta;

        return $this;
    }

    public function metaKey(string $metaKey)
    {
        $this->metaKey = $metaKey;

        return $this;
    }

    public function defaultMeta($defaultMeta)
    {
        $this->defaultMeta = $defaultMeta;

        return $this;
    }

    public function dataOnTopLevel($dataOnTopLevel)
    {
        $this->dataOnTopLevel = (bool) $dataOnTopLevel;

        return $this;
    }

    public function dataKey(string $dataKey)
    {
        $this->dataKey = $dataKey;

        return $this;
    }

    public function statusCodesClass(string $statusCodesClass)
    {
        $this->statusCodesClass = $statusCodesClass;

        return $this;
    }

    /*
     *  * * * * * * * * * * * * * *
     *  Response data
     *  * * * * * * * * * * * * * *
     * */

    /**
     * @param int $code
     * @return ApiResponse
     */
    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $message
     * @return ApiResponse
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param mixed $data
     * @return ApiResponse
     */
    public function setData($data): self
    {
        if (is_array($data)) {
            $this->data = $data;
        } elseif (is_object($data)) {
            if (is_subclass_of($data, 'Illuminate\Http\Resources\Json\JsonResource')) {
                $this->data = $data->toArray(request());
            } else {
                $this->data = (array) $data;
            }
        } else {
            $this->data = [$data];
        }

        return $this;
    }

    /**
     * @param array $meta
     * @param bool $withoutDefault
     * @return self
     */
    public function setMeta(array $meta, bool $withoutDefault = false): self
    {
        if ($withoutDefault) {
            $this->meta = $meta;
        } else {
            $this->meta = array_merge($this->generateDefaultMeta(), $meta);
        }

        return $this;
    }

    /**
     * @param array $headers
     * @return self
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param mixed $options
     * @return self
     */
    public function setOptions($options): self
    {
        $this->options = $options;

        return $this;
    }
}
