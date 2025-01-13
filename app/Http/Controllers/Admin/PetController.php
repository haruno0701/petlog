<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Weight;
use App\Models\Temperature;
use Carbon\Carbon;
use Auth;
class PetController extends Controller
{
    public function add(Request $request)
    {     

        $animals = Animal::orderBy('kinds')->orderBy('name')->get();

        return view('admin.pet.signup',['animals' => $animals]);
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
    public function deleteWeight(Request $request)
    {
      
        $weights = Weight::find($request->id);

        $weights->delete();

        return redirect('admin/pet/top');
    }

    public function vital(Request $request)
    {  
        $pet = Pet::find($request->id);
        
        return view('admin.pet.vital',['pet' => $pet]);
    }

    public function vitallist(Request $request)
    {     
        $pet = Pet::find($request->id);
        
        return view('admin.pet.vitallist',['pet' => $pet]);
    }
    public function manageWeight(Request $request)
    {  
        $pet = Pet::find($request->id);
        // dd($pet->weights);

        return view('admin.pet.manageWeight',['pet' => $pet]);
    }
    public function registWeight(Request $request)
    {     
        $this->validate($request, Weight::$rules);

        $weight = new Weight;

        $weight->fill(["weight" => $request->weight, "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id ]);
        $weight->save();
        // dd($request->all(), $weight, $weight->save());

        return redirect('admin/pet/weight?id=' . $weight->pet_id);
    }

    public function manageTemperature(Request $request)
    {  
        $pet = Pet::find($request->id);

        return view('admin.pet.manageTemperature',['pet' => $pet]);
    }
    public function registTemperature(Request $request)
    {     
        $this->validate($request, Temperature::$rules);

        $temperature = new Temperature;

        $temperature->fill(["temperature" => $request->temperature, "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id ]);
        $temperature->save();

        return redirect('admin/pet/temperature?id=' . $temperature->pet_id);
    }
    public function comparison(Request $request)
    {  
        // dd($request->id);
        $pet = Pet::find($request->id);
        $animals = Animal::all();

        return view('admin.pet.weightComparison',['pet' => $pet],['animals' => $animals]);
    }
}
