<?php

namespace App\Services\DataServices;

use Illuminate\Database\Eloquent\Collection;

class DataMetamorpherService {

    public static function sortDataBy(Collection $data, $criterias = []) {
        $sorted = $data;
        foreach ($criterias as $crit) {
            if(gettype($crit) == 'string') {
                $sorted = $sorted->sortBy(function ($elm) use($crit) {
                    return $elm->getAttributes()[$crit];
                });
            }
            elseif (gettype($crit) == 'object') {
                $sorted = $sorted->sortBy($crit);
            }
        }
        return $sorted;
    }

}

