        unsetしたときの書き方。
        $pets->fill($pets_form)->save();
    
        unsetしないときの書き方。
        $weight->fill([
            "weight" => $request->weight, 
            "date" => Carbon::now()->isoFormat('YYYY/MM/DD(ddd) HH:mm'), 
            "pet_id" => $request->pet_id 
            ]);
        $weight->save();