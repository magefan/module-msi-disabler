<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\MsiDisabler\Rewrite\Magento\InventoryApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
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

    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null): SourceSearchResultsInterface
    {
        return [];
    }
}
