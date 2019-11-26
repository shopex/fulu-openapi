<?php

declare(strict_types=1);

namespace Shopex\FuluOpenApi;


class Other extends Client implements OtherInterface
{

    public function fuluMobileInfoGet(string $phone, float $faceValue): FuluOpenApiResponse
    {
        $params = [
            "json" => [
                "phone" => $phone,
                "face_vaule" => $faceValue,
            ],
        ];
        return $this->request("POST", "fulu.mobile.info.get", $params);
    }
}