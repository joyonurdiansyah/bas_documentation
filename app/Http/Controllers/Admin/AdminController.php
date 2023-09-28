<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dokumentasi;
use App\Faq;
use App\Langkah;
use App\SubLangkah;
use PDF;

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function card()
    {
        return view('admin.create-card');
    }

    public function storeCard(Request $request)
    {
        if ($request->hasFile('files')) {
            // Store the file in the storage/app/public/thumbnail/card directory0
            $fotoPath = $request->file('files')[0]->move('thumbnail/card/', time() . '.' . $request->file('files')[0]->getClientOriginalExtension());

            // Create a new Dokumentasi instance with the data
            $dokumen = new Dokumentasi;
            $dokumen->judul = $request->judul;
            $dokumen->deskripsi = $request->deskripsi;
            $dokumen->foto = $fotoPath;

            $dokumen->slug = str_replace(' ', '-', strtolower($request->judul));

            // 
            $dokumen->link_web = $request->link_web;

            // Save the data to the database
            $dokumen->save();

            return response()->json(['success' => 1, 'message' => 'Berhasil membuat menu dokumentasi']);
        }

        return response()->json(['error' => 0, 'message' => 'Gagal membuat menu dokumentasi']);
    }

    public function dataDokumen()
    {
        $dokumenData = Dokumentasi::all();

        $combinedData = [];

        foreach ($dokumenData as $dokumen) {

            $dataDokumen = [
                'id' => $dokumen->id,
                'judul' => $dokumen->judul,
                'deskripsi' => $dokumen->deskripsi,
                // tambahkan asset
                'foto' => asset($dokumen->foto),
                'link_web' => $dokumen->link_web,
                'slug' => $dokumen->slug
            ];

            $combinedData[] = $dataDokumen;
        }

        $response = [
            'data' => $combinedData,
            'status' => 'success',
            'code' => 200,
        ];

        return response()->json($response);
    }

    public function cariDokumen(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = Dokumentasi::where('judul', 'like', '%' . $keyword . '%')->get();

        return response()->json([
            'data' => $results,
            'status' => 'success',
            'code' => 200,
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function managePost()
    {
        $dokumentasi = Dokumentasi::with('langkah', 'faq')->get();

        return view('admin.post', compact('dokumentasi'));
    }

    public function detail($id)
    {
        $data = Dokumentasi::find($id);

        $dataDokumen = [
            'foto' => asset($data->foto),
        ];

        $dataId = $data->id;

        return view('admin.post', compact('dataDokumen', 'data', 'dataId'));
    }


    public function createLangkah(Request $request)
    {
        $langkah = new Langkah;
        $langkah->id_docs = $request->id_docs;
        $langkah->urutan = $request->urutan;

        if ($langkah->save()) {
            session()->flash('success', 'Langkah berhasil disimpan.');
        } else {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return Redirect::back();
    }


    public function createSubLangkah(Request $request)
    {
        $fotoName = time() . '.' . $request->file('files')[0]->getClientOriginalExtension();
        $fotoPath = $request->file('files')[0]->move('langkah/post/', $fotoName);

        $subLangkah = new SubLangkah;
        $subLangkah->id_langkah = $request->id_langkah;
        $subLangkah->judul = $request->judul;
        $subLangkah->keterangan = $request->keterangan;
        $subLangkah->foto = $fotoName;

        if ($subLangkah->save()) {
            return response()->json(['success' => 1, 'message' => 'subLangkah berhasil disimpan.']);
        } else {
            return response()->json(['success' => 0, 'message' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    public function deleteLangkah(Request $request)
    {
        $idLangkahCard = $request->id_langkah_card;

        // Cari data Langkah berdasarkan ID dan hapus
        $result = Langkah::where('id', $idLangkahCard)->delete();

        if ($result) {
            session()->flash('success', 'Langkah berhasil dihapus.');
        } else {
            session()->flash('error', 'gagal menghapus langkah.');
        }

        return Redirect::back();
    }

    public function deleteSubLangkah(Request $request)
    {
        $idSubLangkahTable = $request->id_sub_langkah;

        // Cari data Langkah berdasarkan ID dan hapus
        $result = SubLangkah::where('id', $idSubLangkahTable)->delete();

        if ($result) {
            session()->flash('success', 'sublangkah berhasil dihapus.');
        } else {
            session()->flash('error', 'gagal menghapus sub langkah.');
        }

        return Redirect::back();
    }

    public function detailFaq($id)
    {
        $data = Dokumentasi::find($id);

        $dataDokumen = [
            'foto' => asset($data->foto),
        ];

        $faqId = $data->id;

        return view('admin.create-faq', compact('dataDokumen', 'data', 'faqId'));
    }

    public function storeFaq(Request $request)
    {
        $fotoPath = $request->file('files')[0]->move('dokumentasi/faq/', time() . '.' . $request->file('files')[0]->getClientOriginalExtension());

        $faq = new Faq();
        $faq->id_docs = $request->id_docs;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->foto = $fotoPath;

        if ($faq->save()) {
            return response()->json(['success' => 1, 'message' => 'subLangkah berhasil disimpan.']);
        } else {
            return response()->json(['success' => 0, 'message' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    // deleteFaq
    public function deleteFaq(Request $request)
    {
        $idfaqCard = $request->id_faq;

        // Cari data Langkah berdasarkan ID dan hapus
        $result = Faq::where('id', $idfaqCard)->delete();

        if ($result) {
            session()->flash('success', 'Langkah berhasil dihapus.');
        } else {
            session()->flash('error', 'gagal menghapus langkah.');
        }

        return Redirect::back();
    }


    public function view_pdf($id)
    {
        // Mengambil data dari database berdasarkan id
        $data = Dokumentasi::find($id);

        // Mengecek apakah data ditemukan
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Menginisialisasi objek MPDF
        $mpdf = new \Mpdf\Mpdf();

        // Mengirim data ke view dan menambahkannya ke PDF
        $mpdf->WriteHTML(view('user-manual-print.test', compact('data')));

        // Menampilkan PDF
        $mpdf->Output();
    }


    // public function cetakPdfManual($id)
    // {
    //     $data = Dokumentasi::find($id);

    //     if ($data) {
    //         $pdf = PDF::loadView('user-manual-print.test', ['data' => $data]);
    //         return $pdf->download('laporan-pegawai.pdf');
    //     } else {
    //         return redirect()->back()->with('error', 'Data tidak ditemukan.');
    //     }

    //     return view('user-manual-print.test', compact('data'));
    // }
}
