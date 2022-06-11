<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class ProfileController extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        $profile = $this->profileModel->getProfile();
        $data = [
            'title' => 'Profile',
            'users' => $profile,
        ];

        return view("super_admin/profile/index", $data);
    }

    public function create()
    {
        return view("super_admin/profile/create");
    }

    public function store()
    {
        $this->profileModel->insert([
            'nama' => $this->request->getPost('nama'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'pengalaman' => $this->request->getPost('pengalaman'),
            'prestasi' => $this->request->getPost('prestasi'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ]);

        return redirect('super_admin/profile')->with('success', 'Data Added Successfully');
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $this->profileModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'pengalaman' => $this->request->getPost('pengalaman'),
            'prestasi' => $this->request->getPost('prestasi'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ]);
        return redirect('super_admin/profile')->with('success', 'Data Update Successfully');
    }

    public function delete()
    {
        $id = $this->request->getPost('id');

        $this->profileModel->delete($id);

        return redirect('super_admin/users')->with('success', 'Data Deleted Successfully');
    }

    public function pdf()
    {
        $id = $this->request->getPost('id');
        $profile = $this->profileModel->getPdf($id);

        $dompdf = new Dompdf(); 
        $dompdf->loadHtml(
                view('super_admin/profile/pdf', [
                    'profile' => $profile, 
                ]
            )
        );
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream("", array("Attachment" => false));
    }

    public function excel()
    {
        $profiles = $this->profileModel->getProfile();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama')
            ->setCellValue('B1', 'Pendidikan')
            ->setCellValue('C1', 'Pengalaman')
            ->setCellValue('D1', 'Prestasi')
            ->setCellValue('E1', 'no_telepon');

        $column = 2;
        // tulis data mobil ke cell
        foreach ($profiles as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['nama'])
                ->setCellValue('B' . $column, $data['pendidikan'])
                ->setCellValue('C' . $column, $data['pengalaman'])
                ->setCellValue('D' . $column, $data['pretasi'])
                ->setCellValue('E' . $column, $data['kontak']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Diri';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}