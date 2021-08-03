<?php

namespace Sankey\Mymodule\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallSchema
 *
 * @package Sankey\Mymodule\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install Customer table
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('sankey_customer');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'customer_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Title'
                )
                ->addColumn(
                    'adress',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Content'
                )
               
                ->setComment('Sankey - Customer');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}