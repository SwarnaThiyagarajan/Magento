<?php 

namespace Embitel\TestApi\Model;

use Magento\Customer\Model\GroupFactory;
use Magento\Customer\Model\ResourceModel\Group\Collection;

class DisplayService implements \Embitel\TestApi\Api\DisplayCustomerInterface
 {
     protected $_collection;
     protected $_groupFactory;

     public function __construct(
        Collection $collection,
        GroupFactory $groupFactory
     ) {
         $this->_collection = $collection;
         $this->_groupFactory = $groupFactory;
     } 

     /**
      * Fuction to display static data using REST Api
      */
    /**
     * get Name
     * 
     * @return array
     */
    public function getCustomerData()
    {
        $data= [
        [
            'firstname' => 'Swarna',
            'lastname' => 'Thiyagarajan',
            'email' => 'swarna.thiyagarajan@embitel.com',
            'telephone' => '8095969120',
            'city' => 'Bangalore',
            'state' => 'Karnataka',
            'country' => 'India'
        ],
        [
            'firstname' => 'Sanchitha',
            'lastname' => 'Alagu',
            'email' => 'sanchitha.alagu@gmail.com',
            'telephone' => '9573485462',
            'city' => 'Bangalore',
            'state' => 'Karnataka',
            'country' => 'India'            
        ],
        [
            'firstname' => 'Sana',
            'lastname' => 'Alagu',
            'email' => 'sana.alagu@gmail.com',
            'telephone' => '9954285462',
            'city' => 'Bangalore',
            'state' => 'Karnataka',
            'country' => 'India' 
        ]];
        return $data;
    }

/**
 * Function to save data to customer_group and fetching the corresponding id and code using REST Api
 */

    /**
     * Get name
     * @param string[] $data
     * 
     * @return array
     */
    public function createCustomerGroupData($data)
    {
        try{
            $customerGroup = $this->_groupFactory->create();
            $customerGroup->setData($data);
            $customerGroup->save();
            $customerData =[
                'customer_group_id' => $customerGroup->getId(),
                'customer_group_code' => $customerGroup->getCustomerGroupCode()
            ];
            return $customerData;
        }
        catch (\Exception $er){
            throw new \Magento\Framework\Webapi\Exception(
                new Phrase($er->getMessage()), 500,
                \Magento\Framework\Webapi\Exception::HTTP_INTERNAL_ERROR,
                ['success' => false, 'error' => 'Something wrong']
            ) ;
        }
    }
 }
 ?>