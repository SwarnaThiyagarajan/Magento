<?php
namespace Embitel\UiComponent\Model;
use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Embitel\UiComponent\Model\ResourceModel\Employee');
    }
}
?>