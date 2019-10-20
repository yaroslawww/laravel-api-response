<?php

namespace Gcsc\LaravelApiResponse;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use HttpStatusCodes\RFCStatusCodes;

/**
 * Class ApiResponse.
 *
 * @method JsonResponse continue(array $data = [], string $message = null)
 * @method JsonResponse switchingProtocols(array $data = [], string $message = null)
 * @method JsonResponse processing(array $data = [], string $message = null)
 * @method JsonResponse ok(array $data = [], string $message = null)
 * @method JsonResponse created(array $data = [], string $message = null)
 * @method JsonResponse accepted(array $data = [], string $message = null)
 * @method JsonResponse nonAuthoritativeInformation(array $data = [], string $message = null)
 * @method JsonResponse noContent(array $data = [], string $message = null)
 * @method JsonResponse resetContent(array $data = [], string $message = null)
 * @method JsonResponse partialContent(array $data = [], string $message = null)
 * @method JsonResponse multiStatus(array $data = [], string $message = null)
 * @method JsonResponse alreadyReported(array $data = [], string $message = null)
 * @method JsonResponse imUsed(array $data = [], string $message = null)
 * @method JsonResponse multipleChoices(array $data = [], string $message = null)
 * @method JsonResponse movedPermanently(array $data = [], string $message = null)
 * @method JsonResponse found(array $data = [], string $message = null)
 * @method JsonResponse seeOther(array $data = [], string $message = null)
 * @method JsonResponse notModified(array $data = [], string $message = null)
 * @method JsonResponse useProxy(array $data = [], string $message = null)
 * @method JsonResponse reserved(array $data = [], string $message = null)
 * @method JsonResponse temporaryRedirect(array $data = [], string $message = null)
 * @method JsonResponse permanentRedirect(array $data = [], string $message = null)
 * @method JsonResponse badRequest(array $data = [], string $message = null)
 * @method JsonResponse unauthorized(array $data = [], string $message = null)
 * @method JsonResponse paymentRequired(array $data = [], string $message = null)
 * @method JsonResponse forbidden(array $data = [], string $message = null)
 * @method JsonResponse notFound(array $data = [], string $message = null)
 * @method JsonResponse methodNotAllowed(array $data = [], string $message = null)
 * @method JsonResponse notAcceptable(array $data = [], string $message = null)
 * @method JsonResponse proxyAuthenticationRequired(array $data = [], string $message = null)
 * @method JsonResponse requestTimeout(array $data = [], string $message = null)
 * @method JsonResponse conflict(array $data = [], string $message = null)
 * @method JsonResponse gone(array $data = [], string $message = null)
 * @method JsonResponse lengthRequired(array $data = [], string $message = null)
 * @method JsonResponse preconditionFailed(array $data = [], string $message = null)
 * @method JsonResponse payloadTooLarge(array $data = [], string $message = null)
 * @method JsonResponse uriTooLong(array $data = [], string $message = null)
 * @method JsonResponse unsupportedMediaType(array $data = [], string $message = null)
 * @method JsonResponse rangeNotSatisfiable(array $data = [], string $message = null)
 * @method JsonResponse expectationFailed(array $data = [], string $message = null)
 * @method JsonResponse imATeapot(array $data = [], string $message = null)
 * @method JsonResponse misdirectedRequest(array $data = [], string $message = null)
 * @method JsonResponse unprocessableEntity(array $data = [], string $message = null)
 * @method JsonResponse locked(array $data = [], string $message = null)
 * @method JsonResponse failedDependency(array $data = [], string $message = null)
 * @method JsonResponse tooEarly(array $data = [], string $message = null)
 * @method JsonResponse upgradeRequired(array $data = [], string $message = null)
 * @method JsonResponse preconditionRequired(array $data = [], string $message = null)
 * @method JsonResponse tooManyRequests(array $data = [], string $message = null)
 * @method JsonResponse requestHeaderFieldsTooLarge(array $data = [], string $message = null)
 * @method JsonResponse unavailableForLegalReasons(array $data = [], string $message = null)
 * @method JsonResponse internalServerError(array $data = [], string $message = null)
 * @method JsonResponse notImplemented(array $data = [], string $message = null)
 * @method JsonResponse badGateway(array $data = [], string $message = null)
 * @method JsonResponse serviceUnavailable(array $data = [], string $message = null)
 * @method JsonResponse gatewayTimeout(array $data = [], string $message = null)
 * @method JsonResponse versionNotSupported(array $data = [], string $message = null)
 * @method JsonResponse variantAlsoNegotiates(array $data = [], string $message = null)
 * @method JsonResponse insufficientStorage(array $data = [], string $message = null)
 * @method JsonResponse loopDetected(array $data = [], string $message = null)
 * @method JsonResponse notExtended(array $data = [], string $message = null)
 * @method JsonResponse networkAuthenticationRequired(array $data = [], string $message = null)
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
            } elseif (! is_array($arguments[0])) {
                throw new \InvalidArgumentException('Data should type of array');
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
            'version' => env('API_VERSION', config('laravel-api-response.api_version', '0')),
            'environment' => app()->environment(),
        ];
    }

    /**
     * @param array|null $data
     * @param int|null $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(?array $data = null, ?int $code = null): JsonResponse
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
     * @param array $data
     * @return ApiResponse
     */
    public function setData(array $data): self
    {
        $this->data = $data;

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
