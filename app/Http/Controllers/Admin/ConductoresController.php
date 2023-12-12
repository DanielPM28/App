<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driver = User::conductores()->paginate(10);
        return view('conductores.index', compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conductores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8',
            'address' => 'nullable|min:6',
        ];

        $messages = [
            'name.required' => 'El nombre del conductor es obligatorio',
            'name.min' => 'El nombre del conductor debe tener más de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo valida',
            'cedula.required' => 'El numero de cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
        ];
        $this->validate($request, $rules, $messages);
        User::create(
            $request->only('name','email','cedula','address')
            + [
                'role' => 'conductor',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'El conductor se ha registrado correctamente';
        return redirect('/conductores')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $driver = User::Conductores()->findOrFail($id);
        return view('conductores.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules =[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|min:8',
            'address' => 'nullable|min:6',
        ];

        $messages = [
            'name.required' => 'El nombre del conductor es obligatorio',
            'name.min' => 'El nombre del conductor debe tener más de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo valida',
            'cedula.required' => 'El numero de cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::Conductores()->findOrFail($id);
        $data =  $request->only('name','email','cedula','address');
        $password = $request->input('password');
        
          if($password)
              $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
              
        $notification = 'La información se ha actualizado correctamente';
        return redirect('/conductores')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::Conductores()->findOrFail($id);
        $nameconduc = $user->name;
        $user->delete();

        $notification = "El conductor $nameconduc se elimino correctamente";

        return redirect('/conductores')->with(compact('notification'));
    }
}
