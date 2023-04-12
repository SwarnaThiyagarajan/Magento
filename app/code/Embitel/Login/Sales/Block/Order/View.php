<?php
namespace Embitel\Login\Sales\Block\Order\View;
/**
 * View Class
 */
class View extends \Magento\Sales\Block\Order\View
{
    protected function _prepareLayout()
    {
        echo 'You are in Overrided prepare Layout function';
    }
}