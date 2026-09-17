<?php

namespace App\Imports;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ApplicationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row): Model|null
    {
        // Skip empty rows where company is blank
        if (!isset($row['company'])) {
            return null;
        }

        return new Application([
            'company'     => $row['company'],
            'job_title'   => $row['job_title'],
            'job_address' => $row['address'] ?? null, // Matches 'Address' header
            
            // Excel stores dates as random numbers. This safely converts it to a real date.
            'applied_at'  => isset($row['applied_at']) 
                                ? Date::excelToDateTimeObject($row['applied_at']) 
                                : null,
                                
            'source_link' => $row['source_link'] ?? null, // Matches 'Source Link' header
            'status'      => $row['status'] ?? 'Applied',
        ]);
    }
}
