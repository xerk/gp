<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = $request->per_page ? $request->per_page : 10;
        $data = User::with('workers','workerOrders')->whereHas('workers', function ($query) use ($request) {
            $query->where('category_id', $request->category);
        })->where('job', 1)->where('region_id', $request->region_id)->paginate($per_page);
        
        return response()->json(['code' => '200', 'data' => $data, 'status'=> true], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workers(Request $request)
    {
        if ($request->has('region_id')) {
            $data = User::with('workers','workers.category', 'workerOrders', 'workerOrders.user', 'workerOrders.worker', 'receiveComments', 'receiveComments.user', 'receiveComments.userSend',  'sendComments', 'city', 'region')->whereHas('workers', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })->withCount(['receiveComments' => function ($q) {
                $q->where('rating', '<>', null);
            }])->where('job', 1)->where('region_id', $request->region_id)->get();
        } else {
            $data = User::with('workers','workers.category', 'workerOrders', 'workerOrders.user', 'workerOrders.worker', 'receiveComments', 'receiveComments.user', 'receiveComments.userSend',  'sendComments', 'city', 'region')->whereHas('workers', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })->withCount(['receiveComments as sum_rating' => function ($q) {
                $q->where('rating', '<>', null)->select(DB::raw('sum(rating)'));
            }])->withCount(['receiveComments as count_rating' => function ($q) {
                $q->where('rating', '<>', null);
            }])->where('job', 1)->get();
        }
        return response()->json(['code' => '200', 'data' => $data, 'status'=> true], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
