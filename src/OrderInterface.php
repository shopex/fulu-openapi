<?php

declare(strict_types=1);

namespace Shopex\FuluOpenApi;


interface OrderInterface
{
    public function fuluOrderDataAdd(string $chargePhone, string $customerOrderNo, float $chargeValue, int $packetKind): FuluOpenApiResponse;

    public function fuluOrderInfoGet(string $customerOrderNo): FuluOpenApiResponse;

    public function fuluOrderMobileAdd(float $chargeValue, string $chargePhone, string $customerOrderNo): FuluOpenApiResponse;

    public function fuluOrderCardAdd(int $buyNum, int $productId, string $customerOrderNo): FuluOpenApiResponse;

    public function fuluOrderDirectAdd(string $customerOrderNo, int $productId, string $chargeAccount, int $buyNum, array $options): FuluOpenApiResponse;
}