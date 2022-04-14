<?php
declare(strict_types=1);

namespace App\Classes\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface SearchService
 * @package App\Classes\Contracts\Services
 */
interface SearchService
{
    /**
     * @param String $search
     * @return Collection
     */
    public function search(String $search): ?Collection;


}

