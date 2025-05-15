<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;

class ExcelExportController extends Controller {

    public function export() {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*  MUESTRA DE LOS USUARIOS */
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Títulos
        $sheet->mergeCells('B2:I2');
        $sheet->setCellValue('B2', 'Reporte de Usuarios');
        $sheet->getStyle('B2')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B2')->getAlignment()->setVertical('center');
        $sheet->setCellValue('B3', 'Tipo de Usuario');
        $sheet->setCellValue('C3', 'Nombre');
        $sheet->setCellValue('D3', 'Email');
        $sheet->setCellValue('E3', 'Email Verificado');
        $sheet->setCellValue('F3', 'Token');
        $sheet->setCellValue('G3', 'Fecha de Creación');
        $sheet->setCellValue('H3', 'Fecha de Actualización');
        $sheet->setCellValue('I3', 'Último Login');

        // Empieza desde la fila B4
        $row = 4;

        // Usuarios
        foreach (User::all() as $user) {

            $sheet->setCellValue('B' . $row, 'Usuario');
            $sheet->setCellValue('C' . $row, $user -> name);
            $sheet->setCellValue('D' . $row, $user -> email);
            $sheet->setCellValue('E' . $row, Carbon::parse($user -> email_verified_at) -> format('d / m / Y') . ' a las ' . Carbon::parse($user -> email_verified_at) -> format('H : i') . ' hrs.');
            $sheet->setCellValue('F' . $row, $user -> remember_token);
            $sheet->setCellValue('G' . $row, Carbon::parse($user -> created_at) -> format('d / m / Y') . ' a las ' . Carbon::parse($user -> created_at) -> format('H : i') . ' hrs.');
            $sheet->setCellValue('H' . $row, Carbon::parse($user -> updated_at) -> format('d / m / Y') . ' a las ' . Carbon::parse($user -> updated_at) -> format('H : i') . ' hrs.');
            if ($user -> last_login == null) {
                $sheet->setCellValue('I' . $row, 'No ha iniciado sesión');
            } else {
                $sheet->setCellValue('I' . $row, Carbon::parse($user -> last_login) -> format('d / m / Y') . ' a las ' . Carbon::parse($user -> last_login) -> format('H : i') . ' hrs.');
            }

            $row++;
        }

        // Admins
        foreach (Admin::all() as $admin) {
            $sheet->setCellValue('B' . $row, 'Administrador');
            $sheet->setCellValue('C' . $row, $admin -> name);
            $sheet->setCellValue('D' . $row, $admin -> email);
            $sheet->setCellValue('E' . $row, Carbon::parse($admin -> email_verified_at) -> format('d / m / Y') . ' a las ' . Carbon::parse($admin -> email_verified_at) -> format('H : i') . ' hrs.');
            $sheet->setCellValue('F' . $row, $admin -> remember_token);
            $sheet->setCellValue('G' . $row, Carbon::parse($admin -> created_at) -> format('d / m / Y') . ' a las ' . Carbon::parse($admin -> created_at) -> format('H : i') . ' hrs.');
            $sheet->setCellValue('H' . $row, Carbon::parse($admin -> updated_at) -> format('d / m / Y') . ' a las ' . Carbon::parse($admin -> updated_at) -> format('H : i') . ' hrs.');
            if ($user -> last_login == null) {
                $sheet->setCellValue('I' . $row, 'No ha iniciado sesión');
            } else {
                $sheet->setCellValue('I' . $row, Carbon::parse($admin -> last_login) -> format('d / m / Y') . ' a las ' . Carbon::parse($admin -> last_login) -> format('H : i') . ' hrs.');
            }
            $row++;
        }

        // Ajuste de ancho automático
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);

        // Definir rango a aplicar bordes: de B2 hasta I{última fila}
        $ultimaFila = $row - 1;
        $rango = "B2:I{$ultimaFila}";

        // Estilo de bordes
        $sheet->getStyle($rango)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // negro
                ],
            ],
        ]);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /*  MUESTRA DE LOS TOTALES DE ADMINISTRADORES/USUARIOS */

        // Títulos
        $sheet->mergeCells('K2:L2');
        $sheet->setCellValue('K2', 'Total de Usuarios');
        $sheet->getStyle('K2')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('K2')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('K2')->getAlignment()->setVertical('center');

        $sheet->setCellValue('K3', 'Total de Usuarios');
        $sheet->setCellValue('K4', 'Total de Administradores');
        $sheet->setCellValue('K5', 'Total de Usuarios en la Base de Datos');
        $sheet->setCellValue('K6', 'Total de Usuarios que han Iniciado Sesión');
        $sheet->setCellValue('K7', 'Total de Usuarios que no han Iniciado Sesión');

        // Total de usuarios
        $totalUsuarios = User::count();
        $sheet->setCellValue('L3', $totalUsuarios);

        // Total de administradores
        $totalAdmins = Admin::count();
        $sheet->setCellValue('L4', $totalAdmins);

        // Total de usuarios en la Base de Datos
        $totalAllUsers = $totalUsuarios + $totalAdmins;
        $sheet->setCellValue('L5', $totalAllUsers);

        // Total de usuarios que han iniciado sesión
        $totalUsuariosLogin = User::whereNotNull('last_login')->count();
        $totalAdminsLogin = Admin::whereNotNull('last_login')->count();
        $totalAllUsersLogin = $totalUsuariosLogin + $totalAdminsLogin;
        $sheet->setCellValue('L6', $totalAllUsersLogin);

        // Total de usuarios que no han iniciado sesión
        $totalUsuariosNoLogin = User::whereNull('last_login')->count();
        $totalAdminsNoLogin = Admin::whereNull('last_login')->count();
        $totalAllUsersNoLogin = $totalUsuariosNoLogin + $totalAdminsNoLogin;
        $sheet->setCellValue('L7', $totalAllUsersNoLogin);

        // Ajuste de ancho automático
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);

        // Definir rango a aplicar bordes: de B2 hasta I{última fila}
        $rango = "K2:L7";

        // Estilo de bordes
        $sheet->getStyle($rango)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'], // negro
                ],
            ],
        ]);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        /* GUARDA LOS CAMBIOS EN FORMATO .xlsx DE EXCEL */

        // Guardar archivo en memoria y enviarlo como descarga
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Todos_los_Usuarios.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    

    }
}