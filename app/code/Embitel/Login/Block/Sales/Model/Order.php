<?php
namespace Embitel\Login\Block\Sales\Model\Order;
/**
 * Order Class
 */
class Order extends \Magento\Sales\Model\Order
{
    public function canCancel()
    {
        echo 'You are in Overrided canCancel function';
    }
}