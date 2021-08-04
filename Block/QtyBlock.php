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

    public function getStockItem($productId)
    {
        return $this->_stockItemRepository->get($productId);
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }
}

?>