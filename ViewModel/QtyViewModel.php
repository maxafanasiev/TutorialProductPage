<?php

namespace Perspective\TutorialProductPage\ViewModel;

class QtyViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var $stockItemRepository
     * @var $registry
     */
    protected $stockItemRepository;
    protected $registry;

    public function __construct(
        \Magento\CatalogInventory\Api\StockItemRepositoryInterface $stockItemRepository,
        \Magento\Framework\Registry                                $registry
    ) {
        $this->stockItemRepository = $stockItemRepository;
        $this->registry = $registry;
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    public function getStockInformation($productId)
    {
        return $this->stockItemRepository->get($productId);
    }


    public function getCurrentProductStock()
    {
        return $this->getStockInformation($this->getCurrentProduct()->getEntityId());
    }
}