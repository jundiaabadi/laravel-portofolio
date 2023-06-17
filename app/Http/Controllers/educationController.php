<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    protected $tipe;

    public function __construct() 
    {
        $this->tipe = 'education';
    }

    public function index()
    {
        $data = riwayat::where('tipe', $this->tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard/education/index')->with('data', $data);
    }

    public function create()
    {
         return view('dashboard/education/create');
    }

    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);

        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'info3' => 'required',
                'tgl_mulai' => 'required'
                
            ],
            [
                'judul.required' => 'data universitas wajib diisi',
                'info1.required' => 'nama fakultas wajib diisi',
                'info2.required' => 'nama prodi wajib diisi',
                'info3.required' => 'IPK wajib diisi',
                'tgl_mulai.required' => 'tanggal mulai wajib diisi'
               
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir
          
        ];

        riwayat::create($data);
       
        return redirect()->route('education.index')->with('success', 'Berhasil menambahkan data education');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         $data = riwayat::where('id', $id)->where('tipe', $this->tipe)->first();
         return view('dashboard.education.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
             $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'info2' => 'required',
                'info3' => 'required',
                'tgl_mulai' => 'required'
             
            ],[
                'judul.required' => 'data universitas wajib diisi',
                'info1.required' => 'nama fakultas wajib diisi',
                'info2.required' => 'nama prodi wajib diisi',
                'info3.required' => 'IPK wajib diisi',
                'tgl_mulai.required' => 'tanggal mulai wajib diisi'

            ]
            );
            $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => $this->tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir

            ];
            riwayat::where('id', $id)->update($data);
           
            return redirect()->route('education.index')->with('success', 'Berhasil update data education');
    }

    public function destroy($id)
    {
        riwayat::where('id', $id)->where('tipe', $this->tipe)->delete();
        return redirect()->route('education.index')->with('success', 'Data Education berhasil dihapus');
    }
}