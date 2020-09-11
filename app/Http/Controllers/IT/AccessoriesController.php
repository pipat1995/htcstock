<?php

namespace App\Http\Controllers\IT;

use App\Http\Controllers\Controller;
use App\Http\FormSearches\AccessFormSearch;
use App\Http\Requests\AccessorieFormRequest;
use App\Repository\AccessoriesRepositoryInterface;
use App\Repository\TransactionsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccessoriesController extends Controller
{
    protected $accessoriesRepository;
    protected $transactionsRepository;
    public function __construct(AccessoriesRepositoryInterface $accessoriesRepositoryInterface, TransactionsRepositoryInterface $transactionsRepositoryInterface)
    {
        $this->accessoriesRepository = $accessoriesRepositoryInterface;
        $this->transactionsRepository = $transactionsRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $formSearch = new AccessFormSearch();
            $accessories = $this->accessoriesRepository->all();
            if ($request->has('search')) {
                $formSearch->search = $request->search;
                $accessories->where('access_name', 'like', '%' . $formSearch->search . '%');
            }
            return \view('it.accessorie.list', \compact('formSearch'))
                ->with('accessories', $accessories->orderBy('created_at', 'desc')->paginate(10)->appends((array) $formSearch));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return \view('it.accessorie.create');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccessorieFormRequest $request)
    {
        try {
            $isCreate = $this->accessoriesRepository->create($request->except(['_token']));
            if (!$isCreate) {
                $request->session()->flash('error',' has been create fail');
                return \back();
            }
            $request->session()->flash('success',' has been create success');
            return \back();
        } catch (\Throwable $th) {
            throw $th;
        }
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
            $accessorie = $this->accessoriesRepository->find($id);
            return \view('it.accessorie.edit')->with('accessorie', $accessorie);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccessorieFormRequest $request, $id)
    {
        try {
            $isUpdate = $this->accessoriesRepository->update($request->except(['_token','_method']),$id);
            if (!$isUpdate) {
                $request->session()->flash('error',' has been update fail');
                return \back();
            }
            $request->session()->flash('success',' has been update success');
            return \back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $accessorie = $this->accessoriesRepository->delete($id);
            if (!$accessorie) {
                Session::flash('error',  ' has been delete fail');
                return \back();
            }
            Session::flash('success',  ' has been delete');
            return \back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkStock(String $id)
    {
        try {
            $result = $this->transactionsRepository->howMuchAccessorie($id);
            if (is_null($result)) {
                return response()->json(['message' => "No data transactions"], 200);
            }
            return response()->json(['name' => $result->accessorie->access_name, 'qty' => (int) $result->quantity], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function accessoriesAvailable()
    {
        try {
            // \dd($this->transactionsRepository->getAccessoriesAvailable());
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
