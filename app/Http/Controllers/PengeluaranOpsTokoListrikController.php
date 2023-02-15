<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranOpsTokoListrik;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PengeluaranOpsTokoListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaranOps = PengeluaranOpsTokoListrik::where('date', Carbon::today()->toDateString())->get();
        $spend = PengeluaranOpsTokoListrik::where('date', Carbon::today()->toDateString())->get();
        $totalGajiKaryawan = $spend->sum('gaji_karyawan');
        $totalReward = $spend->sum('reward_karyawan');
        $pbb = $spend->sum('pbb');
        $etc = $spend->sum('biaya_lain');
        $result =  + (int)$totalGajiKaryawan + (int)$totalReward  + (int)$pbb + (int)$etc;
        return view('TokoListrik.PengeluaranOpsTokoListrik.index', [
            'spends' => $spend,
            'result' => $result,
            'ops' => $pengeluaranOps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TokoListrik.pengeluaranOpsTokoListrik.create', [
            'opss' => PengeluaranOpsTokoListrik::all(),
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
            'biaya_kulakan' => 'nullable|numeric',
            'gaji_karyawan' => 'nullable|numeric',
            'reward_karyawan' => 'nullable|numeric',
            'pbb' => 'nullable|numeric',
            'biaya_lain' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'nota' => 'nullable|array|max:2048',
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

        PengeluaranOpsTokoListrik::create($validated);

        return redirect('/pengeluaran-ops-listrik')->with('success', 'Data pengeluaran operasional berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsTokoListrik  $pengeluaran_ops_listrik
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranOpsTokoListrik $pengeluaran_ops_listrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranOpsTokoListrik  $pengeluaran_ops_listrik
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranOpsTokoListrik $pengeluaran_ops_listrik)
    {
        return view('TokoListrik.pengeluaranOpsTokoListrik.edit', [
            'opss' => PengeluaranOpsTokoListrik::all(),
            'spend' => $pengeluaran_ops_listrik
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranOpsTokoListrik  $pengeluaran_ops_listrik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengeluaranOpsTokoListrik $pengeluaran_ops_listrik)
    {
        $rules = [
            'biaya_kulakan' => 'nullable|numeric',
            'gaji_karyawan' => 'nullable|numeric',
            'reward_karyawan' => 'nullable|numeric',
            'pbb' => 'nullable|numeric',
            'biaya_lain' => 'nullable|numeric',
            'keterangan' => 'nullable',
            'nota' => 'nullable',
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

        PengeluaranOpsTokoListrik::where('id', $pengeluaran_ops_listrik->id)
            ->update($validated);

        return redirect('/pengeluaran-ops-listrik')->with('success', 'Data pengeluaran operasional berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranOpsTokoListrik  $pengeluaran_ops_listrik
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengeluaranOpsTokoListrik $pengeluaran_ops_listrik)
    {
        if ($pengeluaran_ops_listrik->nota) {
            foreach ($pengeluaran_ops_listrik->nota as $oldImage) {
                Storage::delete('nota/' . $oldImage);
            }
        }

        PengeluaranOpsTokoListrik::destroy($pengeluaran_ops_listrik->id);

        return redirect('/pengeluaran-ops-listrik')->with('success', 'Data pengeluaran operasional berhasil dihapus!');
    }

    public function filter(Request $request)
    {
        // dd($request->date);
        $date = Carbon::parse($request->date)->toDateString();
        // return $date;
        $pengeluaranOps = PengeluaranOpsTokoListrik::where('date', Carbon::today()->toDateString())->get();
        $spend = PengeluaranOpsTokoListrik::whereDate('created_at', '=', $date)->get();
        $totalGajiKaryawan = $spend->sum('gaji_karyawan');
        $totalReward = $spend->sum('reward_karyawan');
        $pbb = $spend->sum('pbb');
        $etc = $spend->sum('biaya_lain');
        $result =  + (int)$totalGajiKaryawan + (int)$totalReward  + (int)$pbb + (int)$etc;
        return view('TokoListrik.PengeluaranOpsTokoListrik.index', [
            'spends' => $spend,
            'result' => $result,
            'ops' => $pengeluaranOps,
        ]);
    }
}
