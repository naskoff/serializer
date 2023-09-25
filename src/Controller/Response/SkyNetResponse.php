<?php

declare(strict_types=1);

namespace App\Controller\Response;

use phpDocumentor\Reflection\DocBlock\Tags\PropertyRead;

final class SkyNetResponse
{
    public array $wsGet;

    public array $integratorResponse;

    /**
     * @return array
     */
    public function getWsGet(): array
    {
        return $this->wsGet;
    }

    /**
     * @param array $wsGet
     */
    public function setWsGet(array $wsGet): void
    {
        $this->wsGet = $wsGet;
    }

    /**
     * @return array
     */
    public function getIntegratorResponse(): array
    {
        return $this->integratorResponse;
    }

    /**
     * @param array $integratorResponse
     */
    public function setIntegratorResponse(array $integratorResponse): void
    {
        $this->integratorResponse = $integratorResponse;
    }
}