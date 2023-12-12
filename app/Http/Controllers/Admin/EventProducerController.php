<?php

namespace App\Http\Controllers\admin;

use App\Models\eventProducer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventProducerController extends Controller
{

    


    public function index(){
        $eveproducers = eventProducer::all();
        return view('eventproducers.index', compact('eveproducers'));
    }

    public function create(){
        return view('eventproducers.create');
    }
    public function sendData(Request $request){
        $rules = [
            'name'=> 'required|min:3'
        ];
        $messages =['name.required' => 'El nombre de la produccion es obligatorio.',
         'name.min' => 'El nombre debe tener mas de 3 caracteres'
          ];
        $this->validate($request, $rules, $messages);

        $producers = new eventProducer();
        $producers->name = $request->input('name');
        $producers->image = $request->input('image');
        $producers->description = $request->input('description');
        $producers->save();
        $notification = 'La Produccion se a creado correctamente.';

        return redirect('/productoras')->with(compact('notification'));
    }

    public function edit(eventProducer $produ){
        return view('eventproducers.edit', compact('produ'));
    }
    public function update(Request $request, eventProducer $produ){
        $rules = [
            'name'=> 'required|min:3'
        ];
        $messages =['name.required' => 'El nombre de la produccion es obligatorio.',
         'name.min' => 'El nombre debe tener mas de 3 caracteres'
          ];
        $this->validate($request, $rules, $messages);

        
        $produ->name = $request->input('name');
        $produ->image = $request->input('image');
        $produ->description = $request->input('description');
        $produ->save();
        $notification = 'La Produccion se a actualizado correctamente.';

        return redirect('/productoras')->with(compact('notification'));
    }

    public function destroy(eventProducer $produ){
         $deletename = $produ->name;
         $produ->delete();
         $notification = 'La Produccion'.$deletename.' se a Eliminado correctamente.';
         return redirect('/productoras')->with(compact('notification'));
    }
}
