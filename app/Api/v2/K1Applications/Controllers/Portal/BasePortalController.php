<?php
declare(strict_types=1);

namespace BRASTY\Api\v2\K1Applications\Controllers\Portal;

use BRASTY\Api\v2\Controllers\BaseController;
use Apitte\Core\Annotation\Controller\Path;
use Nette\DI\Container;

/**
 * @Path("/portal")
 */
abstract class BasePortalController extends BaseController
{

	public function initialization(): void
	{
	}

}