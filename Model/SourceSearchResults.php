<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * Please visit Magefan.com for license details (https://magefan.com/end-user-license-agreement).
 */

declare(strict_types=1);

namespace Magefan\MsiDisabler\Model;

use Magento\Framework\Api\SearchResults;
use Magento\InventoryApi\Api\Data\SourceSearchResultsInterface;

class SourceSearchResults extends SearchResults implements SourceSearchResultsInterface
{
}
