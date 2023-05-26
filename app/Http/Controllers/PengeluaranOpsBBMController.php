<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranOpsBBM;
use App\Models\BBM;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            // nota for multiple file image
            'nota' => 'nullable|array|max:2048',
            'created_at' => 'nullable|date',
        ]);


        if ($request->file('nota')) {
            $images = $request->file('nota');
            $imagesName = [];
            foreach ($images as $image) {
                $imageName = time() . '-' . strtoupper(Str::random(10)) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('nota/', $imageName);
                $imagesName[] = $imageName;
            }
            // dd($imagesName);
            $validated['nota'] = $imagesName;
        }

        $pengeluaranOpsBBM = PengeluaranOpsBBM::whereDate('created_at', Carbon::now()->toDateString())->first();


        if ($pengeluaranOpsBBM) {
            return redirect('/PengeluaranOperasionalSPBU')->with('error', 'Hanya boleh input 1 pengeluaran per hari!');
        }

        PengeluaranOpsBBM::create($validated);

        return redirect('/PengeluaranOperasionalSPBU')->with('success', 'Data pengeluaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $PengeluaranOperasionalSPBU
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranOpsBBM $PengeluaranOperasionalSPBU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $PengeluaranOperasionalSPBU
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranOpsBBM $PengeluaranOperasionalSPBU)
    {
        return view('SPBU.pengeluaranOpsBBM.edit', [
            'spend' => $PengeluaranOperasionalSPBU,
            'bbms' => BBM::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranOpsBBM  $PengeluaranOperasionalSPBU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengeluaranOpsBBM $PengeluaranOperasionalSPBU)
    {

        // dd($request->oldImage);

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
            'nota' => 'nullable|array|max:2048',
        ];


        $validated = $request->validate($rules);

        if ($request->file('nota')) {

            if ($request->oldImage) {
                foreach ($request->oldImage as $oldImage) {
                    Storage::delete('nota/' . $oldImage);
                }
            }

            $images = $request->file('nota');
            $imagesName = [];
            foreach ($images as $image) {
                $imageName = time() . '-' . strtoupper(Str::random(10)) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('nota/', $imageName);
                $imagesName[] = $imageName;
            }
            $validated['nota'] = $imagesName;
        }

        PengeluaranOpsBBM::where('id', $PengeluaranOperasionalSPBU->id)
            ->update($validated);

        return redirect('/PengeluaranOperasionalSPBU')->with('success', 'Data pengeluaran berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranOpsBBM  $PengeluaranOperasionalSPBU
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengeluaranOpsBBM $PengeluaranOperasionalSPBU)
    {
        if ($PengeluaranOperasionalSPBU->nota) {
            foreach ($PengeluaranOperasionalSPBU->nota as $oldImage) {
                Storage::delete('nota/' . $oldImage);
            }
        }

        PengeluaranOpsBBM::destroy($PengeluaranOperasionalSPBU->id);

        return redirect('/PengeluaranOperasionalSPBU')->with('success', 'Data pengeluaran berhasil dihapus!');
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
