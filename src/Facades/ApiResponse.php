<?php

namespace Gcsc\LaravelApiResponse\Facades;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * Class ApiResponse
 * @package Gcsc\LaravelApiResponse\Facades
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
