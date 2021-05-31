<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Book;
use Maatwebsite\Excel\Concerns\WithHeadings;


class BooksExport implements FromCollection, WithHeadings
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
            'BOOK EDITION',
            'ISBN NUMBER',
            'YEAR OF PUBLISH',
            'COUNTRY',
            'CREATED_AT',
            'UPDATED_AT',

        ];
    }
}