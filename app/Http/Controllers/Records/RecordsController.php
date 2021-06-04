<?php

namespace App\Http\Controllers\Records;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Records;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Records::all();
        return view('dashboard.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        // Save File
        if($request->hasFile('invoice')) {
            Storage::putFile('public/images/invoice', $request->file('invoice'));
            $pathImage = $request->file('invoice')->hashName();
            $input['invoice'] = $pathImage;
        }
        Records::create($input);

        return view('records.sucesso');
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
     * Update status
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        if (Auth::check()) {
            if(!$request->has('status')) {
                return response()->json([
                    'error' => 'missing status',
                ], 400);
            }

            // Validate request
            $isValid = $request->validate([
                'status' => ['required', 'boolean'],
                '_token' => 'required'
            ]);

            if (!$isValid) {
                return response()->json([
                    'error' => 'body invalid',
                ], 400);
            }

            $newStatus = boolval($request->input('status'));
            $result = Records::where('id', $id)->update(['status' => $newStatus]);

            return response($result);
        } else {
            return response()->json([
                'error' => 'user not authenticate',
            ], 400);
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
        $record = Records::find($id);
         if(!$record){
             return response()->json([
                 'error' => 'record not found'
             ], 404);
         }

         $record->delete();

         return response('', 204);
    }
}
