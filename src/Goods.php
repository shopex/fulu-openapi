<?php

declare(strict_types=1);

namespace Shopex\FuluOpenApi;


class Goods extends Client implements GoodsInterface
{
    public function fuluGoodsInfoGet(string $productId): FuluOpenApiResponse
    {
        $params = [
            "json" => [
                "product_id" => $productId,
            ],
        ];
        return $this->request("POST", "fulu.goods.info.get", $params);
    }

    public function fuluGoodsTemplateGet(string $templateId): FuluOpenApiResponse
    {
        $params = [
            "json" => [
                "template_id" => $templateId,
            ],
        ];
        return $this->request("POST", "fulu.goods.template.get", $params);
    }
}