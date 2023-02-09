<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranOpsBBM;
use App\Models\BBM;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengeluaranOpsBBMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spend = PengeluaranOpsBBM::whereDate('created_at', Carbon::now()->toDateString())->get();
        $totalTebusan = $spend->sum('harga_penebusan_bbm');
        $totalGas = $spend->sum('gas');
        $totalOli = $spend->sum('oli');
        $totalGajiSupervisor = $spend->sum('gaji_supervisor');
        $totalGajiKaryawan = $spend->sum('gaji_karyawan');
        $totalReward = $spend->sum('reward_karyawan');
        $pln = $spend->sum('pln');
        $pdam = $spend->sum('pdam');
        $iuranRt  = $spend->sum('iuran_rt');
        $pbb = $spend->sum('pbb');
        $etc = $spend->sum('biaya_lain');
        $result = (int)$totalTebusan + (int)$totalGas + (int)$totalOli + (int)$totalGajiSupervisor + (int)$totalGajiKaryawan + (int)$totalReward + (int)$pln + (int)$pdam + (int)$iuranRt + (int)$pbb + (int)$etc;
        return view('SPBU.pengeluaranOpsBBM.index', [
            'spends' => $spend,
            'result' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SPBU.pengeluaranOpsBBM.create', [
            'bbms' => BBM::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd(
            $images = $request->file('nota')
        );

        $validated = $request->validate([
            'harga_penebusan_bbm' => 'nullable|numeric',
            'pph' => 'nullable|numeric',
            'tips_sopir' => 'nullable|numeric',
            'oli' => 'nullable|numeric',
            'gas' => 'nullable|numeric',
            'gaji_supervisor' => 'nullable|numeric',
            'gaji_karyawan' => 'nullable|numeric',
            'reward_karyawan' => 'nullable|numeric',
            'pln' => 'nullable|numeric',
            'pdam' => 'nullable|numeric',
            'iuran_rt' => 'nullable|numeric',
            'pbb' => 'nullable|numeric',
            'biaya_lain' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'nota' => 'nullable|max:2048',
        ]);

        if ($request->file('nota')) {
            $images = $request->file('nota');
            $imagesName = [];
            foreach ($images as $image) {
                $imageName = Str::random(10) . '.' . $image->extension();
                $image->move(public_path('uploads'), $imageName);
                $imagesName[] = $imageName;
            }
            dd($imagesName);
            $validated['nota'] = $imagesName;
        }

        PengeluaranOpsBBM::create($validated);

        return redirect('/pengeluaran-ops-bbm')->with('success', 'Data pengeluaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        return view('SPBU.pengeluaranOpsBBM.edit', [
            'spend' => $pengeluaran_ops_bbm,
            'bbms' => BBM::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        $rules = [
            'harga_penebusan_bbm' => 'nullable|numeric',
            'pph' => 'nullable|numeric',
            'tips_sopir' => 'nullable|numeric',
            'oli' => 'nullable|numeric',
            'gas' => 'nullable|numeric',
            'gaji_supervisor' => 'nullable|numeric',
            'gaji_karyawan' => 'nullable|numeric',
            'reward_karyawan' => 'nullable|numeric',
            'pln' => 'nullable|numeric',
            'pdam' => 'nullable|numeric',
            'iuran_rt' => 'nullable|numeric',
            'pbb' => 'nullable|numeric',
            'biaya_lain' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'nota' => 'nullable',
        ];

        $validated = $request->validate($rules);

        PengeluaranOpsBBM::where('id', $pengeluaran_ops_bbm->id)
            ->update($validated);

        return redirect('/pengeluaran-ops-bbm')->with('success', 'Data pengeluaran berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $pengeluaran_ops_bbm
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengeluaranOpsBBM $pengeluaran_ops_bbm)
    {
        PengeluaranOpsBBM::destroy($pengeluaran_ops_bbm->id);

        return redirect('/pengeluaran-ops-bbm')->with('success', 'Data pengeluaran berhasil dihapus!');
    }

    public function filter(Request $request)
    {
        // dd($request->date);
        $date = Carbon::parse($request->date)->toDateString();
        // return $date;
        $spend = PengeluaranOpsBBM::whereDate('created_at', '=', $date)->get();
        $totalTebusan = $spend->sum('harga_penebusan_bbm');
        $totalGas = $spend->sum('gas');
        $totalOli = $spend->sum('oli');
        $totalGajiSupervisor = $spend->sum('gaji_supervisor');
        $totalGajiKaryawan = $spend->sum('gaji_karyawan');
        $totalReward = $spend->sum('reward_karyawan');
        $pln = $spend->sum('pln');
        $pdam = $spend->sum('pdam');
        $iuranRt  = $spend->sum('iuran_rt');
        $pbb = $spend->sum('pbb');
        $etc = $spend->sum('biaya_lain');
        $result = (int)$totalTebusan + (int)$totalGas + (int)$totalOli + (int)$totalGajiSupervisor + (int)$totalGajiKaryawan + (int)$totalReward + (int)$pln + (int)$pdam + (int)$iuranRt + (int)$pbb + (int)$etc;
        return view('SPBU.pengeluaranOpsBBM.index', [
            'spends' => $spend,
            'result' => $result,
        ]);
    }
}
