<?php

namespace App\Http\Controllers\KPI\Rule;

use App\Http\Controllers\Controller;
use App\Http\Requests\KPI\StoreRulePost;
use App\Http\Requests\KPI\UpdateRulePost;
use App\Services\KPI\Interfaces\RuleCategoryServiceInterface;
use App\Services\KPI\Interfaces\RuleServiceInterface;
use App\Services\KPI\Interfaces\TargetUnitServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{

    protected $ruleCategoryService;
    protected $targetUnitService;
    protected $ruleService;
    public function __construct(
        RuleCategoryServiceInterface $ruleCategoryServiceInterface,
        TargetUnitServiceInterface $targetUnitServiceInterface,
        RuleServiceInterface $ruleServiceInterface
    ) {
        $this->ruleCategoryService = $ruleCategoryServiceInterface;
        $this->targetUnitService = $targetUnitServiceInterface;
        $this->ruleService = $ruleServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $this->ruleCategoryService->dropdownRuleCategory();
        $rules = $this->ruleService->filter($request);
        return \view('kpi.RuleList.index', \compact('rules','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->ruleCategoryService->dropdownRuleCategory();
        $unit = $this->targetUnitService->dropdownTargetUnit();
        return \view('kpi.RuleList.create', \compact('category', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRulePost $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();
        try {
            $rule = $this->ruleService->create($validated);
            \dd($rule);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $rule = $this->ruleService->find($id);
            $category = $this->ruleCategoryService->dropdownRuleCategory();
            $unit = $this->targetUnitService->dropdownTargetUnit();
        } catch (\Throwable $th) {
            throw $th;
        }
        return \view('kpi.RuleList.edit', \compact('rule', 'category', 'unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRulePost $request, $id)
    {
        DB::beginTransaction();
        $validated = $request->validated();
        try {
            // \dd($validated);
            $rule = $this->ruleService->update($validated,$id);
            // \dd($rule);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return \back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
