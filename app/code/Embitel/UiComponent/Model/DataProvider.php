<?php

namespace Embitel\UiComponent\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\App\Request\DataPersistorInterface;
use Embitel\UiComponent\Model\ResourceModel\Employee\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     *
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        $this->loadedData = [];
        return $this->loadedData;
    }
}
?>