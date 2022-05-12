<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }
	
	public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'email' => 'required'
        ]);
    
        $setting->email = $request->email;
		$setting->save();
        
        return redirect()->route('settings.edit', 1)
            ->with('success', 'Category updated successfully');
    }
}
