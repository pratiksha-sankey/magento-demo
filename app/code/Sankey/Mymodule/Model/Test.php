<?php
namespace Sankey\Mymodule\Model;
use Sankey\Mymodule\Api\TestInterface;
class Test implements TestInterface
{


     /**
     * {@inheritdoc}
     */
    public function setData($data)
    {   
        $customer_id =  $data['customer_id'];
        $name =$data['name'];
        $adress =$data['adress'];
       
        //Customize the code as per your requirement.

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('sankey_customer');

        $sql = "Insert Into " . $tableName . " (customer_id, name, adress) Values ('".$customer_id."','".$name."','".$adress."')";
        $connection->query($sql);       
        return $data;
    }
}
