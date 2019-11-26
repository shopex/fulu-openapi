<?php

declare(strict_types=1);

namespace Shopex\FuluOpenApi;


interface GoodsInterface
{

    public function fuluGoodsTemplateGet(string $templateId): FuluOpenApiResponse;

    public function fuluGoodsInfoGet(string $productId): FuluOpenApiResponse;
}