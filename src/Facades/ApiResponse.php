<?php

namespace Gcsc\LaravelApiResponse\Facades;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * Class ApiResponse.
 *
 * @method  static JsonResponse continue($data = [], string $message = null)
 * @method  static JsonResponse switchingProtocols($data = [], string $message = null)
 * @method  static JsonResponse processing($data = [], string $message = null)
 * @method  static JsonResponse ok($data = [], string $message = null)
 * @method  static JsonResponse created($data = [], string $message = null)
 * @method  static JsonResponse accepted($data = [], string $message = null)
 * @method  static JsonResponse nonAuthoritativeInformation($data = [], string $message = null)
 * @method  static JsonResponse noContent($data = [], string $message = null)
 * @method  static JsonResponse resetContent($data = [], string $message = null)
 * @method  static JsonResponse partialContent($data = [], string $message = null)
 * @method  static JsonResponse multiStatus($data = [], string $message = null)
 * @method  static JsonResponse alreadyReported($data = [], string $message = null)
 * @method  static JsonResponse imUsed($data = [], string $message = null)
 * @method  static JsonResponse multipleChoices($data = [], string $message = null)
 * @method  static JsonResponse movedPermanently($data = [], string $message = null)
 * @method  static JsonResponse found($data = [], string $message = null)
 * @method  static JsonResponse seeOther($data = [], string $message = null)
 * @method  static JsonResponse notModified($data = [], string $message = null)
 * @method  static JsonResponse useProxy($data = [], string $message = null)
 * @method  static JsonResponse reserved($data = [], string $message = null)
 * @method  static JsonResponse temporaryRedirect($data = [], string $message = null)
 * @method  static JsonResponse permanentRedirect($data = [], string $message = null)
 * @method  static JsonResponse badRequest($data = [], string $message = null)
 * @method  static JsonResponse unauthorized($data = [], string $message = null)
 * @method  static JsonResponse paymentRequired($data = [], string $message = null)
 * @method  static JsonResponse forbidden($data = [], string $message = null)
 * @method  static JsonResponse notFound($data = [], string $message = null)
 * @method  static JsonResponse methodNotAllowed($data = [], string $message = null)
 * @method  static JsonResponse notAcceptable($data = [], string $message = null)
 * @method  static JsonResponse proxyAuthenticationRequired($data = [], string $message = null)
 * @method  static JsonResponse requestTimeout($data = [], string $message = null)
 * @method  static JsonResponse conflict($data = [], string $message = null)
 * @method  static JsonResponse gone($data = [], string $message = null)
 * @method  static JsonResponse lengthRequired($data = [], string $message = null)
 * @method  static JsonResponse preconditionFailed($data = [], string $message = null)
 * @method  static JsonResponse payloadTooLarge($data = [], string $message = null)
 * @method  static JsonResponse uriTooLong($data = [], string $message = null)
 * @method  static JsonResponse unsupportedMediaType($data = [], string $message = null)
 * @method  static JsonResponse rangeNotSatisfiable($data = [], string $message = null)
 * @method  static JsonResponse expectationFailed($data = [], string $message = null)
 * @method  static JsonResponse imATeapot($data = [], string $message = null)
 * @method  static JsonResponse misdirectedRequest($data = [], string $message = null)
 * @method  static JsonResponse unprocessableEntity($data = [], string $message = null)
 * @method  static JsonResponse locked($data = [], string $message = null)
 * @method  static JsonResponse failedDependency($data = [], string $message = null)
 * @method  static JsonResponse tooEarly($data = [], string $message = null)
 * @method  static JsonResponse upgradeRequired($data = [], string $message = null)
 * @method  static JsonResponse preconditionRequired($data = [], string $message = null)
 * @method  static JsonResponse tooManyRequests($data = [], string $message = null)
 * @method  static JsonResponse requestHeaderFieldsTooLarge($data = [], string $message = null)
 * @method  static JsonResponse unavailableForLegalReasons($data = [], string $message = null)
 * @method  static JsonResponse internalServerError($data = [], string $message = null)
 * @method  static JsonResponse notImplemented($data = [], string $message = null)
 * @method  static JsonResponse badGateway($data = [], string $message = null)
 * @method  static JsonResponse serviceUnavailable($data = [], string $message = null)
 * @method  static JsonResponse gatewayTimeout($data = [], string $message = null)
 * @method  static JsonResponse versionNotSupported($data = [], string $message = null)
 * @method  static JsonResponse variantAlsoNegotiates($data = [], string $message = null)
 * @method  static JsonResponse insufficientStorage($data = [], string $message = null)
 * @method  static JsonResponse loopDetected($data = [], string $message = null)
 * @method  static JsonResponse notExtended($data = [], string $message = null)
 * @method  static JsonResponse networkAuthenticationRequired($data = [], string $message = null)
 * @method  static \Gcsc\LaravelApiResponse\ApiResponse setMeta(array $meta, bool $withoutDefault = false)
 * @method  static \Gcsc\LaravelApiResponse\ApiResponse setData(array $data)
 * @method  static \Gcsc\LaravelApiResponse\ApiResponse setMessage(string $message)
 * @method  static \Gcsc\LaravelApiResponse\ApiResponse setCode(int $code)
 * @method  static \Gcsc\LaravelApiResponse\ApiResponse setHeaders(array $headers)
 * @method  static \Gcsc\LaravelApiResponse\ApiResponse setOptions($options)
 */
class ApiResponse extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'api-response';
    }
}
