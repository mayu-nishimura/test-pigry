<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\InitialWeightRequest;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightTargetRequest;

class WeightController extends Controller
{

    public function index(Request $request)
    {
        $query = WeightLog::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('date', [$request->input('start_date'), $request->input('end_date')]);
        }

        $weightLogs = $query->paginate(8);

        return response()->json($weightLogs);
    }

    public function storeInitialWeight(InitialWeightRequest $request)
    {
        // 初期体重の登録処理
        $validated = $request->validated();
        // InitialWeight::create($validated);
        $weightLog = WeightLog::create($validated);

        return redirect()->route('weightLog');
    
    }

    public function store(WeightLogRequest $request)
    {
        // 体重ログの登録処理
        $validated = $request->validated();
        // WeightLog::create($validated);
        $weightLog = WeightLog::create($validated);
        
        return redirect()->route('weightLog');
    }
        
    public function update(WeightLogRequest $request, $id)
    {
        // 体重ログの更新処理
        $validated = $request->validated();
        // WeightLog::find($id)->update($validated);
        $weightLog = WeightLog::findOrFail($id);
        $weightLog->update($validated);
        
        return redirect()->route('weightLog');
    }

    public function delete($id)
    {
        $weightLog = WeightLog::findOrFail($id);
        $weightLog->delete();

        return redirect()->route('weightLog');
    }

    public function setTarget(WeightTargetRequest $request)
    {
        // 目標体重の設定処理
        $validated = $request->validated();
        WeightTarget::create($validated);
        
        return redirect()->route('weightLog');
    }

}
