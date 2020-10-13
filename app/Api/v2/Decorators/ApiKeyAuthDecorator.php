<?php
declare(strict_types=1);

namespace Api\v2\Decorators;

use Apitte\Core\Decorator\IRequestDecorator;
use Apitte\Core\Exception\Runtime\EarlyReturnResponseException;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use Apitte\Core\Http\RequestAttributes;
use Apitte\Core\Schema\Endpoint;
use Psr\Http\Message\ResponseInterface;
use stdClass;

class ApiKeyAuthDecorator implements IRequestDecorator
{

	private const API_KEY = 'test';
	public const UNSECURED = 'unsecured';


	public function decorateRequest(ApiRequest $request, ApiResponse $response): ApiRequest
	{
		/** @var Endpoint $endpoint */
		$endpoint = $request->getAttribute(RequestAttributes::ATTR_ENDPOINT);

		if($endpoint->hasTag(self::UNSECURED)) {
			return $request;
		}

		if (!$apiKey = $request->getQueryParam('apiKey', null)) {
			$this->notAuthenticated($response, 'Query parameter apiKey is snot provided');
		}

		if (!$user = $this->getUser($apiKey)) {
			$this->notAuthenticated($response, 'Provided apiKey was not found');
		}

		return $request->withAttribute('user', $user);
	}

	private function getUser(string $apiKey): ?stdClass
	{
		if ($apiKey !== self::API_KEY) {
			return null;
		}

		return (object) [
			'user' => 'api',
		];
	}

	/**
	 * @param ResponseInterface $response
	 */
	private function notAuthenticated(ResponseInterface $response, string $message)
	{
		$response->getBody()->write(json_encode([
			'error' => ['401' => $message]
		]));

		$response->withStatus(401)
			->withHeader('Content-Type', 'application/json');

		throw new EarlyReturnResponseException($response);
	}
}