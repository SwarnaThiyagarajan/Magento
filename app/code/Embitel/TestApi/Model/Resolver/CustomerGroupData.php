<?php
declare(strict_types=1);

namespace Embitel\TestApi\Model\Resolver;

use Magento\Framework\GraphQl\Exception\GraphQlException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Customer\Model\GroupFactory;

class CustomerGroupData implements ResolverInterface
{
    protected $_groupFactory;

    public function __construct(
        GroupFactory $groupFactory
    ){
        $this->_groupFactory = $groupFactory;
    }
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null,
    ) {
        $data=
        ['customer_group_code' => $args['input']['customerGroupCode'],
         'tax_class_id' => $args['input']['customerTaxClassID']];

        if(empty($args['input']) || !is_array($args['input'])){
            throw new GraphQlInputException(__('"input" should be specified'));
        }

       
       return $this->addCustomerGroupData($data);
    }
/**
 * Function to save data to customer_group and fetching the corresponding id and code using GraphQl Mutation 
 */
    public function addCustomerGroupData($data)
    {    
        try{
            $customerGroup = $this->_groupFactory->create();
            $customerGroup->setData($data);
            $customerGroup->save();
            $customerData =[
                'customerGroupID' => $customerGroup->getId(),
                'customerGroupCode' => $customerGroup->getCustomerGroupCode()
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