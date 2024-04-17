<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Requests\StoreValidation;
class StoreController extends Controller
{
    /**
     * Display a listing of the stores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $stores = Store::all();
            return response()->json($stores);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Store a newly created store in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValidation $request)
    {
        try{
            $store = Store::create($request->all());
            return response()->json($store, 201);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified store.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $store = Store::findOrFail($id);
            return response()->json($store);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified store in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreValidation $request, $id)
    {
        try{
            $store = Store::findOrFail($id);
            $store->update($request->all());

            return response()->json($store, 200);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified store from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $store = Store::findOrFail($id);
            $store->delete();

            return response()->json(null, 204);
        } catch(Exception $e) {
            return response()->json($e);
        }
    }
}
