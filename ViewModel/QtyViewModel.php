<?php

namespace Perspective\TutorialProductPage\ViewModel;

use Magento\Framework\View\Element\Template;

class QtyViewModel extends Template implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var $stockItemRepository
     * @var $registry
     */
    protected $stockItemRepository;
    protected $registry;

    public function __construct(
        Template\Context $context,
        \Magento\CatalogInventory\Api\StockItemRepositoryInterface $stockItemRepository,
        \Magento\Framework\Registry                                $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
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