<?php
declare(strict_types=1);

namespace BRASTY\Api\v2\K1Applications\Controllers\Portal;

use Apitte\Core\Annotation\Controller\Path;
use Apitte\Core\Annotation\Controller\Method;
use Apitte\Core\Annotation\Controller\RequestParameters;
use Apitte\Core\Annotation\Controller\RequestParameter;
use Apitte\Core\Annotation\Controller\Responses;
use Apitte\Core\Annotation\Controller\Response;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Annotation\Controller\OpenApi;

/**
 * @Path("/voucher")
 */
final class VoucherController extends BasePortalController
{

	/**
	 * @Path("/{code}")
	 * @Method("GET")
	 * @RequestParameters({
	 * 		@RequestParameter(name="code", type="string", description="Code from VoucherCodeData")
	 * })

	 * @OpenApi("
	 *	summary: Informace o voucheru
	 *	tags:
	 *		- voucher
	 * ")
	 */
	public function index(ApiRequest $request): array
	{
		return ['test' => 'ok'];
	}

}