<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\MsiDisabler\Rewrite\Magento\InventoryApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\InventoryApi\Api\Data\SourceItemSearchResultsInterface;

/**
 * @inheritdoc
 */
class SourceItemRepositoryInterface implements \Magento\InventoryApi\Api\SourceItemRepositoryInterface
{

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SourceItemSearchResultsInterface
    {
        return [];
    }
}
