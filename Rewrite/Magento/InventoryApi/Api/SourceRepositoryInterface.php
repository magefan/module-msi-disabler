<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\MsiDisabler\Rewrite\Magento\InventoryApi\Api;

use Magefan\MsiDisabler\Model\SourceSearchResults;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\InventoryApi\Api\Data\SourceInterface;
use Magento\InventoryApi\Api\Data\SourceSearchResultsInterface;

/**
 * @inheritdoc
 */
class SourceRepositoryInterface implements \Magento\InventoryApi\Api\SourceRepositoryInterface
{

    /**
     * @inheritdoc
     */
    public function save(SourceInterface $source): void
    {

    }

    /**
     * @inheritdoc
     */
    public function get(string $sourceCode): SourceInterface
    {
        throw new NoSuchEntityException(__('Source with code "%1" does not exist.', $sourceCode));
    }

    /**
     * @inheritdoc
     */
    public function getList(?SearchCriteriaInterface $searchCriteria = null): SourceSearchResultsInterface
    {
        $result = (new SourceSearchResults())->setItems([])->setTotalCount(0);
        if ($searchCriteria !== null) {
            $result->setSearchCriteria($searchCriteria);
        }

        return $result;
    }
}
