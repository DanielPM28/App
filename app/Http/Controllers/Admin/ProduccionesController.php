<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
class ProduccionesController extends Controller
{
    public function index()
    {
        $productions = User::producciones()->paginate(10);
        return view('producciones.index', compact('productions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producciones.create');
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
            'name.required' => 'El nombre de la  Produccion es obligatorio',
            'name.min' => 'El nombre de la produccion debe tener más de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo valida',
            'cedula.required' => 'El numero de cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener 8 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
        ];
        $this->validate($request, $rules, $messages);
        User::create(
            $request->only('name','email','cedula','address')
            + [
                'role' => 'produccion',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'La produccion se ha registrado correctamente';
        return redirect('/producciones')->with(compact('notification'));
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
        $produccion = User::Producciones()->findOrFail($id);
        return view('producciones.edit', compact('produccion'));
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
            'name.required' => 'El nombre de la producción es obligatorio',
            'name.min' => 'El nombre de la producción debe tener más de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo valida',
            'cedula.required' => 'El numero de cédula es obligatorio',
            'cedula.min' => 'La cédula debe tener 10 dígitos',
            'address.min' => 'La dirección debe tener al menos 6 caracteres',
        ];
        $this->validate($request, $rules, $messages);
        $user = User::Producciones()->findOrFail($id);
        $data =  $request->only('name','email','cedula','address');
        $password = $request->input('password');
        
          if($password)
              $data['password'] = bcrypt($password);

        $user->fill($data);
        $user->save();
              
        $notification = 'La información se ha actualizado correctamente';
        return redirect('/producciones')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::Producciones()->findOrFail($id);
        $nameproduc = $user->name;
        $user->delete();

        $notification = "El conductor $nameproduc se elimino correctamente";

        return redirect('/producciones')->with(compact('notification'));
    }
}
