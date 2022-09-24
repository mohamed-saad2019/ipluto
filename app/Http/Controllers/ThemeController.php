<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DotenvEditor;
use Module;

class ThemeController extends Controller
{
    public function index()
    {
    	$env_files = [

            'DEFAULT_THEME' => env('DEFAULT_THEME'),
        ];

    	return view('admin.theme.edit', compact('env_files'));
    }

    public function update(Request $request)
    {
    	$env_keys_save = DotenvEditor::setKeys([
            'DEFAULT_THEME' => $request->default_theme
        ]);

        $env_keys_save->save();

        return back()->with('success', trans('flash.settingssaved'));
    }
}
