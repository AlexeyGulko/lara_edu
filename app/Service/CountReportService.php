<?php


namespace App\Service;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CountReportService
{
    protected Collection $countables;

    public function __construct(array $countables)
    {
        $this->countables = collect($countables);
    }


    public function countAll()
    {
        $query = DB::query();
        foreach ($this->countables as $alias => $model) {
            $query->selectSub($model::selectRaw('COUNT(*)'), $alias);
        }
        return $query->get();
    }

    public function getAliases()
    {

        return $this->countables->keys()->map(function ($item) {
            return (object) [
                'name' => __("models.{$item}"),
                'value' => $item,
            ];
        });
    }
}

