<?php
namespace Nethues\Rentocar\Model\ResourceModel\Car;

/* use required classes */
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id_car'; //primary id of the table

    /**
     * @param EntityFactoryInterface $entityFactory,
     * @param LoggerInterface        $logger,
     * @param FetchStrategyInterface $fetchStrategy,
     * @param ManagerInterface       $eventManager,
     * @param StoreManagerInterface  $storeManager,
     * @param AdapterInterface       $connection,
     * @param AbstractDb             $resource
     */
    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null
    ) {
        $this->_init('Nethues\Rentocar\Model\Car', 'Nethues\Rentocar\Model\ResourceModel\Car');
        
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->storeManager = $storeManager;
    }
    
    protected function _initSelect()
    {
        parent::_initSelect();

        // $this->getSelect()->joinLeft(
        //     ['secondTable' => $this->getTable('sales_order_grid')], //2nd table name by which you want to join mail table
        //     '`main_table`.id_car= `secondTable`.entity_id', // common column which available in both table 
        //     ['secondTable.customer_email','secondTable.customer_name'] // '*' define that you want all column of 2nd table. if you want some particular column then you can define as ['column1','column2']
        // );
        $this->getSelect()->joinLeft(
            ['secondTable' => $this->getTable('nethues_rentocar_carowner')], //2nd table name by which you want to join mail table
            '`main_table`.id_owner= `secondTable`.id_owner', // common column which available in both table 
            ['secondTable.owner_name','secondTable.owner_contact'] // '*' define that you want all column of 2nd table. if you want some particular column then you can define as ['column1','column2']
        );

        $this->getSelect()->joinLeft(
            ['thirdTable' => $this->getTable('nethues_rentocar_customer')], //2nd table name by which you want to join mail table
            '`main_table`.id_customer= `thirdTable`.id_customer', // common column which available in both table 
            ['thirdTable.customer_name','thirdTable.customer_contact'] // '*' define that you want all column of 2nd table. if you want some particular column then you can define as ['column1','column2']
        );

        $this->getSelect()->where(
            "secondTable.is_active =". 1 
        );

    }
}