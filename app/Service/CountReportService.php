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
        return $this->fetch($this->countables);
    }

    public function count($array)
    {
        return $this->fetch($this->countables->only($array));
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

    protected function fetch($countables)
    {
        $query = DB::query();
        foreach ($countables as $alias => $model) {
            $query->selectSub($model::selectRaw('COUNT(*)'), $alias);
        }
        return $this->formatOutput($query->get());
    }

    protected function formatOutput($output)
    {
        return collect((array) $output[0])
            ->map(function ($value, $key) {
                return (object) [
                    'name' => __("models.$key"),
                    'value' => $value,
                ];
            })
            ->flatten()
        ;
    }
}

