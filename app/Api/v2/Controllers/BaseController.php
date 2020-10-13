<?php
declare(strict_types=1);

namespace BRASTY\Api\v2\Controllers;

use Apitte\Core\UI\Controller\IController;
use Apitte\Core\Annotation\Controller\Path;

/**
 * @Path("/api/v2")
 */
abstract class BaseController implements IController
{

	abstract public function initialization();

}