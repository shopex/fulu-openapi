<?php

declare(strict_types=1);

namespace Shopex\FuluOpenApi;


class User extends Client implements UserInterface
{
    public function fuluUserInfoGet(): FuluOpenApiResponse
    {
        $params = [
            "json" => [],
        ];
        return $this->request("POST", "fulu.user.info.get", $params);
    }
}