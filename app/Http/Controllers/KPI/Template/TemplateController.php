<?php

namespace App\Http\Controllers\KPI\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\KPI\StoreTemplatePost;
use App\Services\IT\Interfaces\DepartmentServiceInterface;
use App\Services\KPI\Interfaces\RuleTemplateServiceInterface;
use App\Services\KPI\Interfaces\TemplateServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    protected $templateService;
    protected $ruleTemplateService;
    protected $departmentService;
    public function __construct(
        TemplateServiceInterface $templateServiceInterface,
        RuleTemplateServiceInterface $ruleTemplateServiceInterface,
        DepartmentServiceInterface $departmentServiceInterface
    ) {
        $this->templateService = $templateServiceInterface;
        $this->ruleTemplateService = $ruleTemplateServiceInterface;
        $this->departmentService = $departmentServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = $this->departmentService->dropdown();
        $dropdowntem = $this->templateService->dropdown();
        $templates = $this->templateService->filter($request);

        return \view('kpi.RuleTemplate.index', \compact('departments', 'templates', 'dropdowntem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->departmentService->dropdown();
        return \view('kpi.RuleTemplate.Template.create', \compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplatePost $request)
    {
        DB::beginTransaction();
        $fromValue = $request->except(['_token']);
        try {
            $template = $this->templateService->create($fromValue);
            if (!$template) {
                $request->session()->flash('error', ' has been create template fail');
                return \back();
            }
            $request->session()->flash('success', ' has been create success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return \redirect()->route('kpi.rule-template.create', $template->id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
