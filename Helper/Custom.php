<?php

namespace Perspective\TutorialProductPage\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Custom extends AbstractHelper
{
    private $_availableSku = [
        'MJ01',
        'MJ02',
        'MJ03',
        'MJ12'];

    public function validateProductBySku($sku)
    {
        if(in_array($sku,$this->getValidSkuArray())) {
            return true;
        } else {
            return false;
        }
    }

    public function getValidSkuArray()
    {
        return $this->_availableSku;
    }
}