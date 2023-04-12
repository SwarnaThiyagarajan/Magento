<?php
    
    namespace Embitel\Cart\Plugin;

    class Afterproduct
    {
        public function afterGetName(\Magento\Catalog\Model\Product $subject, $result) {
            return "Ornament ".$result; // Adding Apple in product name
        }
    }