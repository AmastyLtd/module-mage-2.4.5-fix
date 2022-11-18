<?php

declare(strict_types=1);

namespace Amasty\Mage245Fix\Model\ResourceModel\Fulltext\Collection\SearchResultApplier;

use Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection\SearchResultApplierInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Data\Collection;

/**
 * Correction of strong typing and table prefixes. Our categorical filter can be a multiselect, and therefore we
 * always set the array to the filter category, and magneto in this class in the private method
 * categoryProductByCustomSortOrder strongly types the value from the filter as int, which causes an error.
 * Also fixing an error with table prefixes, in the categoryProductByCustomSortOrder method,
 * when sorting by name and price, table prefixes do not resolve
 */
class Mage245Fix implements SearchResultApplierInterface
{
    /**
     * @var Collection|\Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection
     */
    private $collection;

    /**
     * @var SearchResultInterface
     */
    private $searchResult;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $currentPage;

    public function __construct(
        Collection $collection,
        SearchResultInterface $searchResult,
        int $size,
        int $currentPage
    ) {
        $this->collection = $collection;
        $this->searchResult = $searchResult;
        $this->size = $size;
        $this->currentPage = $currentPage;
    }

    public function apply(): void
    {
        if (empty($this->searchResult->getItems())) {
            $this->collection->getSelect()->where('NULL');
            return;
        }

        $ids = [];
        $items = $this->sliceItems($this->searchResult->getItems(), $this->size, $this->currentPage);
        foreach ($items as $item) {
            $ids[] = (int)$item->getId();
        }

        $orderList = implode(',', $ids);
        $this->collection->getSelect()
            ->where('e.entity_id IN (?)', $ids)
            ->reset(\Magento\Framework\DB\Select::ORDER)
            ->order(new \Zend_Db_Expr("FIELD(e.entity_id,$orderList)"));
    }

    /**
     * Slice current items
     */
    private function sliceItems(array $items, int $size, int $currentPage): array
    {
        if ($size !== 0) {
            // Check that current page is in a range of allowed page numbers, based on items count and items per page,
            // than calculate offset for slicing items array.
            $itemsCount = count($items);
            $maxAllowedPageNumber = (int)ceil($itemsCount/$size);
            if ($currentPage < 1) {
                $currentPage = 1;
            }
            if ($currentPage > $maxAllowedPageNumber) {
                $currentPage = $maxAllowedPageNumber;
            }

            $offset = $this->getOffset($currentPage, $size);
            $items = array_slice($items, $offset, $size);
        }

        return $items;
    }

    /**
     * Get offset for given page.
     */
    private function getOffset(int $pageNumber, int $pageSize): int
    {
        return ($pageNumber - 1) * $pageSize;
    }
}
