<?php

namespace App\Exports;

use App\Models\Students;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StudentsExport implements FromCollection, WithHeadings, WithEvents
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
    /**
     * Define the headings
     */
    public function headings(): array
    {
        $columns = ['NO.', 'AWARD YEAR', 'NSTP', 'REGION', 'SERIAL NUMBER', 'LAST NAME', 'FIRST NAME', 'EXTENSION', 'M.I/MIDDLE', 'BIRTHDAY', 'SEX', 'STREET/BRGY.', 'TOWN/CITY', 'PROVINCE', 'HEI_NAME', 'INSTITUTIONAL CODE', 'TYPE OF HEIS', 'PROGRAM', 'MAIN PROGRAM NAME', 'EMAIL ADDRESS', 'TELEPHONE/CP Number'];

        $numberingRow = range(1, count($columns));
        $query = Students::where('status', 'accepted');
        $AY = null;
        $selectedStudents = request()->input('selectedStudents');
        
        if ($selectedStudents) {
            $studentIds = explode(',', $selectedStudents);
            $AY = $query->whereIn('student_id', $studentIds)->pluck('school_year')->first();
        }

        return [
            ['NATIONAL SERVICE TRAINING PROGRAM (NSTP) REGIONAL DATABASE'],
            ['AY '. $AY],
            $numberingRow,
            $columns,
            [], 
        ];
    }

    /**
     * Format and merge heading row
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $highestColumn = $event->sheet->getHighestColumn();

                $event->sheet->mergeCells("A1:{$highestColumn}1");

                $event->sheet->getRowDimension(1)->setRowHeight(30);
                $event->sheet->getStyle("A1")->getFont()->setBold(true)->setSize(14);
                $event->sheet->getStyle("A1")->getAlignment()
                ->setHorizontal('left') 
                ->setVertical('center');
                $event->sheet->getStyle("A2")->getFont()->setBold(true)->setSize(12);

                $columns = ['NO.', 'AWARD YEAR', 'NSTP', 'REGION', 'SERIAL NUMBER', 'LAST NAME', 'FIRST NAME', 'EXTENSION', 'M.I/MIDDLE', 'BIRTHDAY', 'SEX', 'STREET/BRGY.', 'TOWN/CITY', 'PROVINCE', 'HEI_NAME', 'INSTITUTIONAL CODE', 'TYPE OF HEIS', 'PROGRAM', 'MAIN PROGRAM NAME', 'EMAIL ADDRESS', 'TELEPHONE/CP Number'];

                foreach (range('A', $highestColumn) as $index => $column) {
                    $columnWidth = max(strlen($columns[$index]) + 5, 15); 
                    $event->sheet->getColumnDimension($column)->setWidth($columnWidth);

                    $event->sheet->getStyle("{$column}3:{$column}1000")->getAlignment()
                        ->setHorizontal('center')
                        ->setVertical('center'); 
                }

                $event->sheet->getStyle("A3:{$highestColumn}3")->getAlignment()
                    ->setHorizontal('center')
                    ->setVertical('center');

                $event->sheet->getStyle("A4:{$highestColumn}4")->getFont()->setBold(true);
            },
        ];
    }

    /**
     * Fetch and format student data
     */
    public function collection()
    {
        $query = null;
        $selectedStudents = request()->input('selectedStudents');
        $category = request()->input('key');
    
        if($category === 'ALL') {
            $query = Students::where('status', 'accepted');
        } else {
            $query = Students::where('category', $category)
            ->where('status', 'accepted');
        }
    
        if ($selectedStudents) {
            $studentIds = explode(',', $selectedStudents);
            $query->whereIn('student_id', $studentIds);
        }
        
        return $query->get()->map(function ($student, $index) {
            $student_email = User::where('id', $student->student_id)->first();
            return [
                'NO.' => $index + 1,
                'AWARD YEAR' => $student->school_year,
                'NSTP' => $student->category,
                'REGION' => '06-WESTERN VISAYAS',
                'SERIAL NUMBER' => '',
                'LAST NAME' => $student->lname,
                'FIRST NAME' => $student->fname,
                'EXTENSION' => $student->ext,
                'M.I/MIDDLE' => $student->mname,
                'BIRTHDAY' => $student->birthday,
                'SEX' => $student->gender,
                'STREET/BRGY.' => $student->brgy,
                'TOWN/CITY' => $student->city,
                'PROVINCE' => $student->province,
                'HEI_NAME' => $student->hei_name,
                'INSTITUTIONAL CODE' => $student->institutional_code,
                'TYPE OF HEIS' => $student->types_of_heis,
                'PROGRAM' => $student->program_level_code,
                'MAIN PROGRAM NAME' => $student->course,
                'EMAIL ADRESS' => $student_email->email,
                'TELEPHONE/CP Number' => $student->contact_no,
            ];
        });
    }
    
}
