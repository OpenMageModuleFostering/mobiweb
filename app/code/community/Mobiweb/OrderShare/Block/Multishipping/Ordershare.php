<?php
class Mobiweb_OrderShare_Block_Multishipping_Ordershare extends Mage_Checkout_Block_Multishipping_Success {
    public function getOrder() {
        return Mage::getModel('sales/order')->loadByIncrementId($this->getOrderId());    
    }

    public function getOrderedProduct($ordered_product) {
        return Mage::getModel('catalog/product')->load($ordered_product->getProductId());
    }

    public function getTwitterUser() {
        return trim(Mage::getStoreConfig('ordershare/twitter/username'));
    }

    public function getTwitterUrl($_twitter_text, $_product) {
        $_twitter_user = $this->getTwitterUser();
        $_twitter_url = "http://twitter.com/share?text=" .  urlencode ( $_twitter_text ) . "&url=" . $_product->getProductUrl();
        if ($_twitter_user != "") {
            $_twitter_url .=  "&via=" . $_twitter_user;
        }

        return $_twitter_url;
    }

    public function getFacebookUrl($_product) {
        return "http://facebook.com/sharer.php?u=" .  rawurlencode($_product->getProductUrl()) . '&t=' .  rawurlencode(Mage::getStoreConfig('general/store_information/name') .  ' | ' . $_product->getName());
    }

    public function getLinkedinUrl($_linkedin_text, $_product){
        return "http://www.linkedin.com/cws/share?text=" .  urlencode ( $_linkedin_text ) . "&url=" .  rawurlencode($_product->getProductUrl()) . '&t=' .  rawurlencode(Mage::getStoreConfig('general/store_information/name') .  ' | ' . $_product->getName());
    }
    public function getGoogleUrl($_product){
    return "https://plus.google.com/share?url=".rawurlencode($_product->getProductUrl())."&hl=en".'&t='.rawurlencode(Mage::getStoreConfig('general/store_information/name').' | '.$_product->getName());
    
    }

    public function getPinUrl($_product){
    return "https://pinterest.com/pin/create/button/?source_url=".rawurlencode($_product->getProductUrl())."&media=".$_product->getImageUrl()."&description=".rawurlencode($_product->getName()).'&t='.rawurlencode(Mage::getStoreConfig('general/store_information/name') .' | '. $_product->getName());
     }
   public function getStumbleUrl($_product){
    return "http://www.stumbleupon.com/badge/?url=".rawurlencode($_product->getProductUrl()).'&t='.rawurlencode(Mage::getStoreConfig('general/store_information/name') .' | '. $_product->getName());
     }
    
    public function getStoreName() {
        return Mage::getStoreConfig('general/store_information/name');
    }

    public function getColumnCount() {
        return Mage::getStoreConfig('ordershare/design/columncount');
    }
}
