<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function crearExcel()
    {
        $archivoexcel = new Spreadsheet();
        $archivoexcel->getProperties()->setCreator("Archivo1")->setTitle("Prueba");
        $archivoexcel->setActiveSheetIndex(0);
        $hojaActiva = $archivoexcel->getActiveSheet();
        $archivoexcel->getDefaultStyle()->getFont()->setName('Tahoma');
        $archivoexcel->getDefaultStyle()->getFont()->setSize(10);
        $hojaActiva->getColumnDimension('A')->setWidth(50);
        $colum = 1;
        $hojaActiva->setCellValue('A' . $colum, 'CARGO');
        $colum = $colum + 1;
        $hojaActiva->setCellValue('A' . $colum, 'Jefe Departamento TI');

        $hojaActiva->setCellValue('B2', 232322);
        $hojaActiva->setCellValue('C1', 'Markos FErnad')->setCellValue('D1', 'CDP');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Pruebas.xls"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($archivoexcel, 'Xls');
        $writer->save('php://output');

        //        $writer = new Xls($archivoexcel);
        //        $writer->save('Pruebas excel.xls');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
