<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Auth;
class PetController extends Controller
{
    public function add()
    {     
        return view('admin.pet.signup');
    }
        

    public function create(Request $request)
    {
        $this->validate($request, Pet::$rules);

        $pets = new Pet;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $pets->image_path = basename($path);
        } else {
            $pets->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $pets->fill($form);
        $pets->user_id = Auth::id();

        $pets->save();
        
        return redirect('admin/pet/top');
    }

    

    public function index(Request $request)
    {
              
        $posts = Pet::all();
        
        return view('admin.pet.top',['posts' => $posts]);
        
    }


    public function update(Request $request)
    {
       
        $this->validate($request, Pet::$rules);
        
        $pets = Pet::find($request->id);
        
        $pets_form = $request->all();

        if ($request->remove == 'true') {
            $pets_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $pets_form['image_path'] = basename($path);
        } else {
            $pets_form['image_path'] = $pets->image_path;
        }

        unset($pets_form['image']);
        unset($pets_form['remove']);
        unset($pets_form['_token']);
       
        $pets->fill($pets_form)->save();

        return redirect('admin/pet/top');
    }

    public function delete(Request $request)
    {
      
        $pet = Pet::find($request->id);

        $pet->delete();

        return redirect('admin/pet/top');
    }

    public function vital(Request $request)
    {  
        $pet = Pet::find($request->id);
        
        return view('admin.pet.vital',['pet' => $pet]);
    }

    public function vitallist(Request $request)
    {     
        $pet = Pet::all();
        
        return view('admin.pet.vitallist',['pet' => $pet]);
    }

}
