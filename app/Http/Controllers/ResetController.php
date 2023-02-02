<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetController extends Controller
{
    public function reset()
    {
        foreach (['categories', 'products'] as $folder) {
            Storage::deleteDirectory($folder);
            Storage::makeDirectory($folder);
            $files = Storage::disk('reset')->files($folder);
            foreach ($files as $file) {
                Storage::put($file, Storage::disk('reset')->get($file));
            }
        }
        Artisan::call('migrate:fresh --seed');
        session()->flash(
            'success',
            'Проект було перезалито. Можна розпочати зі стартового стану'
        );
        return redirect()->route('index');
    }
}
