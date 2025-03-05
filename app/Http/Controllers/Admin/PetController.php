<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Weight;
use App\Models\Stroll;
use App\Models\Temperature;
use App\Models\Urine;
use App\Models\Flight;
use App\Models\Category;
use App\Models\Detail;

use Carbon\Carbon;
use Auth;
class PetController extends Controller
{
    public function add(Request $request)
    {

        $animals = Animal::orderBy('kinds')->orderBy('name')->get();

        return view('admin.pet.signup', ['animals' => $animals]);
    }


    public function create(Request $request)
    {
        // dd($request);
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
        // dd($request->animal_id);
        if ($request->animal_id == null) {
            $posts = Pet::all();
        } else {
            $animal = Animal::find($request->animal_id);
            // dd($animal);
            // $posts = Pet::all();
            $posts = $animal->pets;
        }

        // dd($posts);
        return view('admin.pet.top', ['posts' => $posts]);

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
        // dd($request->id);
        $weights = Weight::find($request->id);
        // dd($weights);
        $weights->delete();

        return redirect('admin/pet/weight?id=' . $weights->pet_id);
    }
    public function deleteTemperature(Request $request)
    {
        // dd($request->id);
        $temperatures = Temperature::find($request->id);
        $temperatures->delete();

        return redirect('admin/pet/temperature?id=' . $temperatures->pet_id);
    }
    public function deleteStroll(Request $request)
    {
        // dd($request->id);
        $strolls = Stroll::find($request->id);
        $strolls->delete();

        return redirect('admin/pet/stroll?id=' . $strolls->pet_id);
    }
    public function deleteUrine(Request $request)
    {
        // dd($request->id);
        $urines = Urine::find($request->id);
        $urines->delete();

        return redirect('admin/pet/urine?id=' . $urines->pet_id);
    }
    public function deleteFlight(Request $request)
    {
        // dd($request->id);
        $flights = Flight::find($request->id);
        $flights->delete();

        return redirect('admin/pet/flight?id=' . $flights->pet_id);
    }

    public function vital(Request $request)
    {
        $pet = Pet::find($request->id);

        return view('admin.pet.vital', ['pet' => $pet]);
    }

    public function vitallist(Request $request)
    {
        $pet = Pet::find($request->id);
        $cond_category = $request->cond_category;
        if($cond_category == 'all' || $cond_category == null){
            $details = Detail::where('pet_id',$request->id)->get();
        }else{
            $details = Detail::where('category_id',$cond_category)->where('pet_id',$request->id)->get();
        }

        return view('admin.pet.vitallist', ['pet' => $pet, 'details' => $details]);
    }
    public function manageWeight(Request $request)
    {
        $pet = Pet::find($request->id);
        $details = Detail::where('category_id', 1)->where('pet_id', $request->id)->get();
        // dd($pet->weights);

        return view('admin.pet.manageWeight', ['pet' => $pet, 'details' => $details]);
    }
    public function registHealth(Request $request)
    {
        // dd($request);
        $this->validate($request, Detail::$rules);

        $detail = new Detail;

        $detail->fill(["category_value" => $request->category_value, "category_id" => $request->category_id,"date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id]);
        $detail->save();
        // dd($request->all(), $weight, $weight->save());

        return redirect('admin/pet/' . $request->category_name . '?id=' . $detail->pet_id);
    }

    public function manageTemperature(Request $request)
    {
        $pet = Pet::find($request->id);
        $details = Detail::where('category_id', 2)->where('pet_id', $request->id)->get();

        return view('admin.pet.manageTemperature', ['pet' => $pet, 'details' => $details]);
    }
    public function registTemperature(Request $request)
    {
        // dd($request);
        $this->validate($request, Temperature::$rules);

        $temperature = new Temperature;

        $temperature->fill(["temperature" => $request->temperature, "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id]);
        $temperature->save();

        return redirect('admin/pet/temperature?id=' . $temperature->pet_id);
    }
    public function manageStroll(Request $request)
    {
        $pet = Pet::find($request->id);
        $details = Detail::where('category_id', 3)->where('pet_id', $request->id)->get();

        // dd($pet->strolls);

        return view('admin.pet.manageStroll', ['pet' => $pet, 'details' => $details]);
    }
    public function registStroll(Request $request)
    {
        // dd($request);

        $this->validate($request, Stroll::$rules);

        $stroll = new Stroll;

        $stroll->fill(["stroll" => $request->stroll, "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id]);
        $stroll->save();
        // dd($request->all(), $stroll, $stroll->save());


        return redirect('admin/pet/stroll?id=' . $stroll->pet_id);
    }


    public function manageUrine(Request $request)
    {
        $pet = Pet::find($request->id);
        $details = Detail::where('category_id', 4)->where('pet_id', $request->id)->get();

        return view('admin.pet.manageUrine', ['pet' => $pet, 'details' => $details]);
    }
    public function registUrine(Request $request)
    {

        $this->validate($request, Urine::$rules);

        $urine = new Urine;

        $urine->fill(["urine" => $request->urine, "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id]);
        $urine->save();

        return redirect('admin/pet/urine?id=' . $urine->pet_id);
    }
    public function manageFlight(Request $request)
    {
        $pet = Pet::find($request->id);
        $details = Detail::where('category_id', 5)->where('pet_id', $request->id)->get();

        return view('admin.pet.manageFlight', ['pet' => $pet, 'details' => $details]);
    }
    public function registFlight(Request $request)
    {

        $this->validate($request, Flight::$rules);

        $flight = new Flight;

        $flight->fill(["flight" => $request->flight, "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), "pet_id" => $request->pet_id]);
        $flight->save();

        return redirect('admin/pet/flight?id=' . $flight->pet_id);
    }

    public function comparison(Request $request)
    {
        // dd($request);
        $pet = Pet::find($request->pet_id);
        // dd($pet);

        $animal = null;
        if ($pet) {
            $animal = Animal::find($pet->animal_id);
        }
        
        $pets = Pet::where('user_id', Auth::id())->get();
        $details = Detail::where('category_id', 1)->where('pet_id', $request->pet_id)->get();

        return view('admin.pet.weightComparison', [ 'pet' => $pet,'pets' => $pets, 'animal' => $animal, 'details' => $details]);
    }
}
