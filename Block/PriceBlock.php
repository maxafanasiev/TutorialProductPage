<?php
namespace Perspective\TutorialProductPage\Block;

use Magento\Framework\Pricing\Amount\AmountInterface;
use Magento\Framework\Pricing\Price\PriceInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Pricing\Render\Amount;
use Magento\Framework\Pricing\Render\RendererPool;
use Magento\Framework\Pricing\SaleableInterface;
use Magento\Framework\View\Element\Template;

class PriceBlock extends Amount
{
    public function __construct(
        Template\Context $context,
        AmountInterface $amount,
        PriceCurrencyInterface $priceCurrency,
        RendererPool $rendererPool,
        SaleableInterface $saleableItem = null,
        PriceInterface $price = null,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $amount,
            $priceCurrency,
            $rendererPool,
            $saleableItem,
            $price,
            $data
        );
    }

    public function addText()
    {
        return 'Price :';
    }
    public function formatCurrency(
        $amount,
        $includeContainer = true,
        $precision = PriceCurrencyInterface::DEFAULT_PRECISION
    ) {
        $part2 =  $this->priceCurrency->format($amount, $includeContainer, $precision);
        $part1 = '>Price : ';
        $new = explode('>',$part2);
        $res = $new[0].$part1.$new[1];
        return $res;

    }

}