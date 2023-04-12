<?php
declare(strict_types=1);

namespace Embitel\TestApi\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class Customer implements ResolverInterface
{
    /**
     * For displaying static data using GraphQL 
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $customer = [
            [
                'firstname' => "Swarna",
                'lastname' => "Thiyagarajan",
                'email' => "swarna.thiyagarajan@embitel.com",
                'telephone' => "8095969120",
                'city' => "Bangalore",
                'state' => "Karnataka",
                'country' => "India"
            ],
            [
                'firstname' => "Sanchitha",
                'lastname' => "Alagu",
                'email' => "sanchitha.alagu@gmail.com",
                'telephone' => "9573485462",
                'city' => "Bangalore",
                'state' => "Karnataka",
                'country' => "India"            
            ],
            [
                'firstname' => "Sana",
                'lastname' => "Alagu",
                'email' => "sana.alagu@gmail.com",
                'telephone' => "9954285462",
                'city' => "Bangalore",
                'state' => "Karnataka",
                'country' => "India" 
            ]
        ];
            return [
                'total_count' => count($customer),
                'items' => $customer
            ];
    }
}
?>
