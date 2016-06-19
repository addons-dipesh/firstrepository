<?php
class Nimesh_Test_Block_Test extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
         $this->getLayout()->getBlock('breadcrumbs')
            ->addCrumb('home',
                array(
                    'label'=>Mage::helper('catalogsearch')->__('Home'),
                    'title'=>Mage::helper('catalogsearch')->__('Go to Home Page'),
                    'link'=>Mage::getBaseUrl())
                )
            ->addCrumb('customer',
                array(
                    'label'=>Mage::helper('customer')->__('Foo')
                ))
        ;
        return parent::_prepareLayout(); // TODO: Change the autogenerated stub
    }

    public function myMessage(){
        return 'I am Nimesh Koshti, This is my module';
    }

}