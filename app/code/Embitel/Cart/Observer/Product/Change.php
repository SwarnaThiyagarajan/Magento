<?php

namespace Embitel\Cart\Observer\Product;

use \Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\App\RequestInterface;

class Change implements ObserverInterface 
{

    /**
     * Change custom price
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote_item');
        $item = ($item->getParentItem() ? $item->getParentItem() : $item);
        $customPrice = 100000;
        $item->setCustomPrice($customPrice);
        $item->setQty(5);
        $item->setOriginalCustomPrice($customPrice);
        $item->getProduct()->setIsSuperMode(true);
    }
}
