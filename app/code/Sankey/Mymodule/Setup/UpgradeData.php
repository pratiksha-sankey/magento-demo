<?php

namespace Sankey\Mymodule\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Sankey\Mymodule\Setup
 */
class UpgradeData implements UpgradeDataInterface
{

    /**
     * Creates sample customer
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.1.1') < 0
        ) {
            $tableName = $setup->getTable('sankey_customer');

            $data = [
                [
                    'name' => 'pratiksha shindepatil',
                    'adress' => 'Akluj',
                ],
                [
                    'name' => 'pratiksha more',
                    'adress' => 'Tambave',
                ],
            ];

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}