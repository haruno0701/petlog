<?php

namespace App\Http\Controllers\Create;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;


class PetController2 extends Controller
{
    public function add(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != null) {
            
            $posts = Pet::where('name', $cond_name)->get();
        } else {
            
            $posts = Pet::all();
        }
  
        return view('create.pet.top',['posts' => $posts, 'cond_name' => $cond_name]);
        
    }

    public function create()
    {
        return redirect('create/pet/top');
    }

    public function edit()
    {
        
        return view('create.pet.signup');
    }

    public function update(Request $request)
    {
        $this->validate($request, Pet::$rules);

        $pet = new Pet;
        $form = $request->all();

        if (isset($form['memo'])) {
            $path = $request->file('memo')->store('public/memo');
            $pet->memo_path = basename($path);
        } else {
            $pet->memo_path = null;
        }

        unset($form['created_at']);
        unset($form['updated_at']);

        $pet->fill($form);
        $pet->save();
        return redirect('create/pet/signup');
    }
}
