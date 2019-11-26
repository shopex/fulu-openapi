<?php

declare(strict_types=1);

namespace Shopex\FuluOpenApi;


interface UserInterface
{
    public function fuluUserInfoGet(): FuluOpenApiResponse;
}