<?php

namespace Perspective\TutorialProductPage\Block;

use Magento\Catalog\Model\ProductRender;

class QtyBlock extends \Magento\Framework\View\Element\Template
{

    protected $_stockItemRepository;
    protected $registry;

    public function __construct(
        \Magento\Backend\Block\Template\Context                   $context,
        \Magento\CatalogInventory\Model\Stock\StockItemRepository $stockItemRepository,
        \Magento\Framework\Registry                               $registry,
        array                                                     $data = []
    )
    {
        $this->_stockItemRepository = $stockItemRepository;
        $this->registry = $registry;
        parent::__construct(
            $context,
            $data
        );
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    public function getStockInformation($productId)
    {
        $productStockInfo = $this->_stockItemRepository->get($productId);
        return $productStockInfo;
    }
}
