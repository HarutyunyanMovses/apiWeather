<?php
declare(strict_types=1);

namespace App\Services;

use App\Classes\Contracts\Services\SearchService as SearchServiceContract;
use App\Models\SearchModel;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class SearchService
 * @package App\Services
 */
class SearchService implements SearchServiceContract
{
    /**
     * limit items in chunk
     */
    public const LIMIT_CHUNK = 50;

    /**
     * @inheritDoc
     */
    public function search(String $search): ?Collection
    {
        return SearchModel::where("name", "LIKE", $search . '%')->limit(static::LIMIT_CHUNK)->get();
    }


}

