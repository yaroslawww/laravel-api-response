<?php

namespace Gcsc\LaravelApiResponse\Facades;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * Class ApiResponse.
 *
 * @method  static JsonResponse continue(array $data = [], string $message = null)
 * @method  static JsonResponse switchingProtocols(array $data = [], string $message = null)
 * @method  static JsonResponse processing(array $data = [], string $message = null)
 * @method  static JsonResponse ok(array $data = [], string $message = null)
 * @method  static JsonResponse created(array $data = [], string $message = null)
 * @method  static JsonResponse accepted(array $data = [], string $message = null)
 * @method  static JsonResponse nonAuthoritativeInformation(array $data = [], string $message = null)
 * @method  static JsonResponse noContent(array $data = [], string $message = null)
 * @method  static JsonResponse resetContent(array $data = [], string $message = null)
 * @method  static JsonResponse partialContent(array $data = [], string $message = null)
 * @method  static JsonResponse multiStatus(array $data = [], string $message = null)
 * @method  static JsonResponse alreadyReported(array $data = [], string $message = null)
 * @method  static JsonResponse imUsed(array $data = [], string $message = null)
 * @method  static JsonResponse multipleChoices(array $data = [], string $message = null)
 * @method  static JsonResponse movedPermanently(array $data = [], string $message = null)
 * @method  static JsonResponse found(array $data = [], string $message = null)
 * @method  static JsonResponse seeOther(array $data = [], string $message = null)
 * @method  static JsonResponse notModified(array $data = [], string $message = null)
 * @method  static JsonResponse useProxy(array $data = [], string $message = null)
 * @method  static JsonResponse reserved(array $data = [], string $message = null)
 * @method  static JsonResponse temporaryRedirect(array $data = [], string $message = null)
 * @method  static JsonResponse permanentRedirect(array $data = [], string $message = null)
 * @method  static JsonResponse badRequest(array $data = [], string $message = null)
 * @method  static JsonResponse unauthorized(array $data = [], string $message = null)
 * @method  static JsonResponse paymentRequired(array $data = [], string $message = null)
 * @method  static JsonResponse forbidden(array $data = [], string $message = null)
 * @method  static JsonResponse notFound(array $data = [], string $message = null)
 * @method  static JsonResponse methodNotAllowed(array $data = [], string $message = null)
 * @method  static JsonResponse notAcceptable(array $data = [], string $message = null)
 * @method  static JsonResponse proxyAuthenticationRequired(array $data = [], string $message = null)
 * @method  static JsonResponse requestTimeout(array $data = [], string $message = null)
 * @method  static JsonResponse conflict(array $data = [], string $message = null)
 * @method  static JsonResponse gone(array $data = [], string $message = null)
 * @method  static JsonResponse lengthRequired(array $data = [], string $message = null)
 * @method  static JsonResponse preconditionFailed(array $data = [], string $message = null)
 * @method  static JsonResponse payloadTooLarge(array $data = [], string $message = null)
 * @method  static JsonResponse uriTooLong(array $data = [], string $message = null)
 * @method  static JsonResponse unsupportedMediaType(array $data = [], string $message = null)
 * @method  static JsonResponse rangeNotSatisfiable(array $data = [], string $message = null)
 * @method  static JsonResponse expectationFailed(array $data = [], string $message = null)
 * @method  static JsonResponse imATeapot(array $data = [], string $message = null)
 * @method  static JsonResponse misdirectedRequest(array $data = [], string $message = null)
 * @method  static JsonResponse unprocessableEntity(array $data = [], string $message = null)
 * @method  static JsonResponse locked(array $data = [], string $message = null)
 * @method  static JsonResponse failedDependency(array $data = [], string $message = null)
 * @method  static JsonResponse tooEarly(array $data = [], string $message = null)
 * @method  static JsonResponse upgradeRequired(array $data = [], string $message = null)
 * @method  static JsonResponse preconditionRequired(array $data = [], string $message = null)
 * @method  static JsonResponse tooManyRequests(array $data = [], string $message = null)
 * @method  static JsonResponse requestHeaderFieldsTooLarge(array $data = [], string $message = null)
 * @method  static JsonResponse unavailableForLegalReasons(array $data = [], string $message = null)
 * @method  static JsonResponse internalServerError(array $data = [], string $message = null)
 * @method  static JsonResponse notImplemented(array $data = [], string $message = null)
 * @method  static JsonResponse badGateway(array $data = [], string $message = null)
 * @method  static JsonResponse serviceUnavailable(array $data = [], string $message = null)
 * @method  static JsonResponse gatewayTimeout(array $data = [], string $message = null)
 * @method  static JsonResponse versionNotSupported(array $data = [], string $message = null)
 * @method  static JsonResponse variantAlsoNegotiates(array $data = [], string $message = null)
 * @method  static JsonResponse insufficientStorage(array $data = [], string $message = null)
 * @method  static JsonResponse loopDetected(array $data = [], string $message = null)
 * @method  static JsonResponse notExtended(array $data = [], string $message = null)
 * @method  static JsonResponse networkAuthenticationRequired(array $data = [], string $message = null)
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
