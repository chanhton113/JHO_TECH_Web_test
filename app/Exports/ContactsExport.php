<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactsExport implements FromCollection, WithHeadings
{
    // Hàm lấy dữ liệu contacts
    public function collection()
    {
        return Contact::all(); // Hoặc lọc theo yêu cầu của bạn
    }

    // Hàm lấy heading (tiêu đề cột) của file Excel
    public function headings(): array
    {
        return [
            'Contact ID',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Opportunity',
            'Created At',
            'Updated At',
        ];
    }
}
