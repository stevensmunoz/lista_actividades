<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Actividades;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Actividad\StoreActividadRequest;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
    /**
     * pagina las actividades por usuarios
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //cargar categorias

         $categorias = Categoria::all();

        // pagina las actividades de usuarios
        $actividades = Auth::user()
            ->actividades()
            ->orderBy('es_completo')
            ->orderByDesc('created_at')
            ->paginate(4);

        // devuelve la vista con las actividades

        return view('actividades', [
            'actividades' => $actividades,
            'categorias' => $categorias
        ]);


    }

    /**
     * almacena una nueva actividad incompleta
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreActividadRequest $request)
    {
        Auth::user()->actividades()->create([
            'titulo' => $request['titulo'],
            'categoria_id' => $request['categoria_id'],
            'es_completo' => false,
        ]);

        // flash a success message to the session
        session()->flash('status', 'Actividad creada!');

        // redirect
        return redirect('/actividades');
    }

    /**
     * para marcar la actividad como completa.
     *
     * @param \App\Models\Actividades $actividad
     * @return \Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Actividades $actividad)
    {

        $actividad = Actividades::find($request->id);
        $actividad->es_completo = true;
        $actividad->update();




        // flash a success message to the session
        session()->flash('status', 'Actividad Completa!');

        //
        return redirect('/actividades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividades  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Actividades $actividad)
    {
        $actividad = Actividades::find($request->id);

        $actividad->delete();
        session()->flash('error', 'Actividad ha sido borrado correctamente!');
        return redirect('/actividades');
    }


}
