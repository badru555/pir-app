<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\Applicationdocument;
use App\Models\Documentprojectrisk;
use App\Models\Documentobservationrisk;
use App\Models\Documentobservationriskactivity;

class DraftController extends Controller
{
    public function pir(Applicationdocument $applicationdocument)
    {
        $get_observations = Documentobservationrisk::whereIn('id', explode(',', $applicationdocument->documentobservationrisk_ids))->get();
        $observations = [];
        foreach ($get_observations as $key => $value) {
            $observations[$value->fase][] = $value;
        }
        $get_migitations = Documentprojectrisk::whereIn('id', explode(',', $applicationdocument->documentprojectrisk_ids))->get();
        $migitations = [];
        foreach ($get_migitations as $key => $value) {
            $migitations[$value->fase][] = $value;
        }

        // $survey_count = Survey::selectRaw('MONTH(created_at) month, COUNT(*) count')->whereYear('created_at', date('Y'))->groupBy('month')->orderBy('month')->get();
        // $survey_total = [];
        // for ($m = 1; $m <= 12; $m++) {
        //     $found = false;
        //     foreach ($survey_count as $value) {
        //         if ($m == $value->month) {
        //             $month = date('F', mktime(0, 0, 0, $m, 1));
        //             $survey_total[] = [$month, $value->count];
        //             $found = true;
        //             break;
        //         }
        //     }
        //     if (!$found) {
        //         $month = date('F', mktime(0, 0, 0, $m, 1));
        //         $survey_total[] = [$month, 0];
        //     }
        // }
        // echo '<pre>' . json_encode($survey_count, JSON_PRETTY_PRINT) . '</pre>';
        $data = [
            // 'barchart_surveypermonth' => $survey_total,
            'applicationdocument' => $applicationdocument,
            'observations' => $observations,
            'migitations' => $migitations
        ];
        // echo '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
        $view = view('dashboard.draft.report', $data);
        $htmlrender = $view->render();
        $html = explode('<div style="display: none;">NEWPAGE</div>', $htmlrender);
        $pdf = new TCPDF;
        $pdf::SetTitle('PIR Document');

        // BAB
        function chapter($title)
        {
            $pdf = new TCPDF;
            $pdf::AddPage('L');
            $imagePath = public_path('images/draft/office.jpg');
            $pdf::setPrintHeader(false);
            $pdf::setPrintFooter(false);
            $pdf::SetMargins(0, 0, 0, true);
            $pdf::SetAutoPageBreak(false, 0);
            $pdf::Image($imagePath, 0, 0, 320, 230, '', '', '', false, 300, '', false, false, 0, false, false, false);

            $pdf::SetMargins(10, 10, true);
            $pdf::SetAutoPageBreak(true, 0);

            $title = '<h1 style="background-color: orange; font-size:45; color: white; text-align:center;">' . $title . '</h1>';
            $pdf::WriteHTMLCell(0, 0, 9, 75, $title, 0, 1, false);
        }
        for ($i = 0; $i < count($html); $i++) {
            if ($i == 0) {
                $pdf::AddPage('L');
                $imageUrl = public_path('images/draft/building.jpg');
                $pdf::Image($imageUrl, $pdf::GetX(), $pdf::GetY(), $pdf::getPageWidth() - 21, 0, '', '', '', false, 300, '', false, false, 0, false, false, false);
                $title = '<h1 style="background-color: #0a6ba0; font-size:24; color: white;">Laporan Post Implementation Review Aplikasi ' . $applicationdocument->application->name . '</h1>';
                $subtitle = '<p>' . $applicationdocument->created_at->format('d F Y') . '</p>';
                $pdf::WriteHTMLCell(0, 0, 9, 168, $title, 0, 1, false);
                $pdf::WriteHTMLCell(0, 0, 9, 180, $subtitle, 0, 1, false);
                //page 2
                $pdf::AddPage('L');
                $imagePath = public_path('images/draft/office.jpg');
                $pdf::setPrintHeader(false);
                $pdf::setPrintFooter(false);
                $pdf::SetMargins(0, 0, 0, true);
                $pdf::SetAutoPageBreak(false, 0);
                $pdf::Image($imagePath, 0, -120, 320, 230, '', '', '', false, 300, '', false, false, 0, false, false, false);

                $pdf::SetMargins(10, 10, true);
                $pdf::SetAutoPageBreak(true, 0);

                $contentlist = '<h2>Daftar Isi:</h2>';
                $contentlist .= '<ol>';
                $contentlist .= '<li>Laporan Pengawasan Manajemen Proyek</li>';
                $contentlist .= '<li>Daftar Risiko dan Kontrol</li>';
                $contentlist .= '<li>Rencana Perbaikan Aplikasi Kedepan</li>';
                $contentlist .= '<li>Lampiran Kepuasan User</li>';
                $contentlist .= '<li>Lampiran Hasil Pentest</li>';
                $contentlist .= '</ol>';

                $pdf::WriteHTMLCell(0, 0, 9, 115, $contentlist, 0, 1, false);
                $note = '<p>“Dokumen ini, bersama dengan dokumen terkait lainnya, bersifat rahasia dan diperuntukkan hanya untuk keperluan evaluasi oleh Perusahaan Umum Percetakan Uang RI (“PERURI”). Dokumen ini tidak seharusnya diperlihatkan, digunakan, diperbanyak atau disebarkan, baik secara keseluruhan atau sebagian, untuk tujuan selain dari evaluasi oleh PERURI tanpa izin tertulis dari Kepala Divisi TI.”</p>';
                $pdf::WriteHTMLCell(0, 0, 130, 160, $note, 0, 1, false);
                //page 3
                chapter('LAPORAN PENGAWASAN MANAJEMEN PROYEK');
            }
            if ($i == 2) {
                chapter('DAFTAR RISIKO DAN KONTROL');
            }
            $pdf::AddPage('L');
            $pdf::WriteHTML($html[$i], true, false, true, false, '');
        }
        // KEPUASAN PENGGUNA
        chapter('HASIL SURVEY KEPUASAN PENGGUNA');
        $pdf::AddPage('L');
        $pdf::WriteHTML($applicationdocument->surveyresult, true, false, true, false, '');

        // KEPUASAN PENGGUNA GAMBAR
        if ($applicationdocument->surveyresult_image != null) {
            // chapter('HASIL SURVEY KEPUASAN PENGGUNA');
            $pdf::AddPage('L');
            $imagePath = public_path('storage/' . $applicationdocument->surveyresult_image);
            $pdf::Image($imagePath, $pdf::GetX(), $pdf::GetY(), $pdf::getPageWidth() - 150, 0, '', '', '', false, 300, 'C', false, false, 1, false, false, false);
        }

        // HASIL PENTEST
        chapter('HASIL PENTEST');
        $pdf::AddPage('L');
        $imagePath = public_path('storage/' . $applicationdocument->pentestresult_image);
        $pdf::Image($imagePath, $pdf::GetX(), $pdf::GetY(), $pdf::getPageWidth() - 150, 0, '', '', '', false, 300, 'C', false, false, 1, false, false, false);

        chapter('RENCANA PERBAIKAN');
        $pdf::AddPage('L');
        $planning = $applicationdocument->plantodo;
        $pdf::WriteHTML($planning, true, false, true, false, '');

        $pdf::Output('Dokumen PIR.pdf');
    }
}
