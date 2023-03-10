<?php

namespace App\Exports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\FromArray;
// use Maatwebsite\Excel\Concerns\FromCollection;

class SurveysExport implements FromArray
{
    protected $surveys;

    function __construct($surveys)
    {
        $this->surveys = $surveys;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {

        return $this->surveys;
    }
}
