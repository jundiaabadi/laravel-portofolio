<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    protected $tipe;

    public function __construct() 
    {
        $this->tipe = 'experience';
    }

    public function index()
    {
        $data = riwayat::where('tipe', $this->tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard/experience/index')->with('data', $data);
    }

    public function create()
    {
         return view('dashboard/experience/create');
    }

    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'judul wajib diisi',
                'info1.required' => 'nama perusahaan wajib diisi',
                'tgl_mulai.required' => 'tanggal mulai wajib diisi',
                'isi.required' => 'Ada yang belum diisi'
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi
        ];

        riwayat::create($data);
       
        return redirect()->route('experience.index')->with('success', 'Berhasil menambahkan data experience');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         $data = riwayat::where('id', $id)->where('tipe', $this->tipe)->first();
         return view('dashboard.experience.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
             $request->validate(
            [
               'judul' => 'required',
                'info1' => 'required',
                'tgl_mulai' => 'required',
                'isi' => 'required'
            ],[
                'judul.required' => 'judul wajib diisi',
                'info1.required' => 'nama perusahaan wajib diisi',
                'tgl_mulai.required' => 'tanggal mulai wajib diisi',
                'isi.required' => 'Ada yang belum diisi'

            ]
            );
            $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi

            ];
            riwayat::where('id', $id)->update($data);
           
            return redirect()->route('experience.index')->with('success', 'Berhasil update data');
    }

    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->tipe)->delete();
        return redirect()->route('experience.index')->with('success', 'Data Experience berhasil dihapus');
    }
}