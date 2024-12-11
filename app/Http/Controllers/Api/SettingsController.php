<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Http\Resources\SettingsResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return new SettingsResource($setting);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $validatedData = $request->validated();
        $setting->update($validatedData);
        return new SettingsResource($setting);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return response()->json([
            'message' => 'Setting Deleted'
        ]);
    }
}
