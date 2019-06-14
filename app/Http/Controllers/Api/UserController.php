<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Region;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->job === 1) {
            $data = User::with('workers', 'workerOrders')->where('id', $user->id)->first();
        } else {
            $data = User::with('workers', 'clientOrders')->where('id', $user->id)->first();
        }
        return response()->json(['code' => '200', 'data' => $data, 'status'=> true], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function region(Request $request)
    {
        $user = $request->user();
        $data = Region::with('city')->where('city_id', $user->city_id)->get();
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
    public function show(Request $request)
    {
        $user = $request->user();
        if ($user->job == 1) {
            $data = User::with('workers','workers.category', 'workerOrders', 'workerOrders.user', 'workerOrders.worker', 'receiveComments', 'receiveComments.user', 'receiveComments.userSend',  'sendComments', 'city', 'region')->withCount(['receiveComments as sum_rating' => function ($q) {
                $q->where('rating', '<>', null)->select(DB::raw('sum(rating)'));
            }])->withCount(['receiveComments as count_rating' => function ($q) {
                $q->where('rating', '<>', null);
            }])->where('id', $user->id)->first();
        } else {
            $data = User::with('clientOrders', 'clientOrders.user', 'clientOrders.worker', 'receiveComments', 'receiveComments.user', 'receiveComments.userSend',  'sendComments', 'sendComments.user', 'sendComments.userSend',)->where('id', $user->id)->where('job', 0)->first();
        }
        return response()->json(['code' => '200', 'data' => $data, 'status'=> true], 200);
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
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$request->user()->id,
                'password' => 'sometimes|nullable|string|min:6',
                'phone' => 'required|max:255|unique:users,phone,'.$request->user()->id,

            ]);
            $user = $request->user();
    
            $input = $request->except('password', 'avatar');
            
            if (! $request->filled('password')) {
                $user->fill($input)->save();
                return response()->json(['code' => 200, 'success_message' => __('Profile updated successfully!'), 'status' => true]);
            }
            
            $user->password = bcrypt($request->password);
            $user->fill($input)->save();
            return response()->json(['code' => 200, 'success_message' => __('Profile (and password) updated successfully!'), 'status' => true]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWorker(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $request->validate([
                'category_id' => 'required',
                'experience' => 'required|numeric',
                'biography' => 'sometimes|nullable|string|min:6',
                'price' => 'required',

            ]);
            $user = $request->user();
            $worker = Worker::where('user_id', $user->id)->first();
            $input = $request->all();
            
            $worker->fill($input)->save();
            return response()->json(['code' => 200, 'success_message' => __('Profile updated successfully!'), 'status' => true]);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkPassword(Request $request)
    {
        $user = $request->user();
        if(Hash::check($request->password, $user->password )) {
            return response()->json(['code' => 200, 'message' => 'Password is correct', 'status' => true ]);
        } else {
            return response()->json(['code' => 200, 'message' => 'Password is invalid', 'status' => false ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',

        ]);
        
        $user = User::where('email', $request->email)->exists();
        if($user) {
            return response()->json(['code' => 200, 'message' => 'Your email is correct', 'status' => true ]);
        } else {
            return response()->json(['code' => 422, 'message' => 'Oops! Email is incorrect.', 'status' => false ]);
        }
    }
}
