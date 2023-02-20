<?php

namespace App\Imports;

use App\Models\Review;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReviewsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Review::firstOrCreate([
                'reviewer' => $row['reviewer'],
                'email' => $row['email'],
                'review' => $row['review'],
                'rating' => $row['rating'],
                'employee' => $row['employee'],
                'employees_position' => $row['employees_position'],
                'unique_employee_number' => $row['unique_employee_number'],
                'company' => $row['company'],
                'company_description' => $row['company_description'],
            ]);
        }
    }
}
