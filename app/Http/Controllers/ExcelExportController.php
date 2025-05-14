<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class ExcelExportController extends Controller
{
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Escribe datos en el Excel
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Correo');
        $sheet->setCellValue('A2', 'Juan');
        $sheet->setCellValue('B2', 'juan@example.com');

        // Guarda en un archivo temporal
        $writer = new Xlsx($spreadsheet);
        $fileName = 'usuarios.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        // Descarga como respuesta
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);
    }
}
