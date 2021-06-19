<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Book;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithColumnWidths;

class BooksExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Book::all();
    }

    public function headings(): array
    {
        return [
            'BOOK ID',
            'BOOK NAME',
            'AUTHOR ID',
            'PUBLISHER ID',
            'USER ID',
            'BOOK EDITION',
            'ISBN NUMBER',
            'YEAR OF PUBLISH',
            'COUNTRY',
            'CREATED AT',
            'UPDATED AT',

        ];
    }
}