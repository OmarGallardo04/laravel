<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peliculas;
use App\Models\Actores;

class PrincipalController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function peliculas()
    {
        $peliculas= Peliculas::all();
        return view('peliculas',compact('peliculas'));
    }
    public function agregarpeliculas()
    {
        return view('agregarpeliculas');
    }
    public function actores()
    {
        $actores = Actores::all();  // Obtiene todos los actores
        return view('actores', compact('actores'));
    }
    public function agregaractores()
    {
        return view('agregaractores');
    }
    public function guardar(Request $request, Peliculas $peliculas)
    {
        $request->validate([
            'nombre'=>'required',
            'sinopsis'=>'required',
            'categoria'=>'required',
            'duracion'=>'required',
            'foto'=>'required'
        ],[
            'nombre.required'=>'campo nombre necesario',
            'sinopsis.required'=>'campo sinopsis necesario',
            'categoria.required'=>'campo categoria necesario',
            'duracion.required'=>'campo duracion necesario',
            'foto.required'=>'campo foto necesario'
        ]);

        $peliculas->create($request->all());

        $foto = time().'.'.$request->foto->extension();
$request->foto->move(public_path('imagenes'), $foto);

Peliculas::create([
    'nombre' => $request->nombre,
    'sinopsis' => $request->sinopsis,
    'categoria' => $request->categoria,
    'duracion' => $request->duracion,
    'foto' => $foto,
    'fecha' => $request->fecha,
    'mayores_edad' => $request->mayores_edad,
]);
        return redirect()->route('peliculas')->with('mensaje','pelicula agregado correctamente');
    }
    public function borrar($pelicula)
    {
        $pe=Peliculas::find($pelicula);
        $pe->delete();
        return redirect()->route('peliculas');
    }
    public function editar(Peliculas $pelicula)
    {
        return view ('editar',compact('pelicula'));
    }

    public function actualizar(Request $request, Peliculas $pelicula)
{
    // Validar los campos
    $request->validate([
        'nombre' => 'required',
        'sinopsis' => 'required',
        'categoria' => 'required',
        'duracion' => 'required',
        'foto' => 'required',
    ], [
        'nombre.required' => 'Campo nombre necesario',
        'sinopsis.required' => 'Campo sinopsis necesario',
        'categoria.required' => 'Campo categoría necesario',
        'duracion.required' => 'Campo duración necesario',
        'foto.required' => 'Campo foto necesario',
    ]);


    // Si se ha subido una nueva imagen, manejarla
    if ($request->hasFile('foto')) {
        // Eliminar la imagen anterior si existe
        if (file_exists(public_path('imagenes/' . $pelicula->foto))) {
            unlink(public_path('imagenes/' . $pelicula->foto)); // Eliminar la imagen anterior
        }

        // Guardar la nueva imagen
        $foto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('imagenes'), $foto);

        // Actualizar la película con la nueva imagen
        $pelicula->update([
            'nombre' => $request->nombre,
            'sinopsis' => $request->sinopsis,
            'categoria' => $request->categoria,
            'duracion' => $request->duracion,
            'foto' => $foto,  // Actualizar con la nueva imagen
        ]);
    } else {
        // Si no se subió una nueva imagen, solo actualizar los campos que no son imagen
        $pelicula->update([
            'nombre' => $request->nombre,
            'sinopsis' => $request->sinopsis,
            'categoria' => $request->categoria,
            'duracion' => $request->duracion,
            // La foto no se actualiza si no se sube una nueva
        ]);
    }

    return redirect()->route('peliculas')->with('mensaje', 'Película actualizada correctamente');

}
public function guardar2(Request $request, Actores $actores)
{
    // Validar los campos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'biografia' => 'required|string',
        'fecha_nacimiento' => 'required|date',
        'genero' => 'required|in:masculino,femenino,otro',
        'nacionalidad' => 'required|string|max:100',
        'premios' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ], [
        'nombre.required' => 'El campo nombre es obligatorio',
        'biografia.required' => 'El campo biografía es obligatorio',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
        'genero.required' => 'El campo género es obligatorio',
        'nacionalidad.required' => 'El campo nacionalidad es obligatorio',
        'foto.image' => 'La foto debe ser una imagen válida',
    ]);

    // Procesar la foto si es que existe
    if ($request->hasFile('foto')) {
        $foto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('imagenes/actores'), $foto);
    } else {
        $foto = null;
    }

    // Crear el nuevo actor
    Actores::create([
        'nombre' => $request->nombre,
        'biografia' => $request->biografia,
        'fecha_nacimiento' => $request->fecha_nacimiento,
        'genero' => $request->genero,
        'nacionalidad' => $request->nacionalidad,
        'premios' => $request->premios,
        'foto' => $foto,
    ]);

    return redirect()->route('actores')->with('mensaje', 'Actor agregado correctamente');
}
public function borrar2($actor)
    {
        $actor = Actores::find($actor);

        if ($actor) {
            // Eliminar la foto asociada si existe
            if (file_exists(public_path('imagenes/actores/' . $actor->foto))) {
                unlink(public_path('imagenes/actores/' . $actor->foto));
            }

            // Eliminar el actor
            $actor->delete();

            return redirect()->route('actores')->with('mensaje', 'Actor eliminado correctamente');
        }

        return redirect()->route('actores')->with('error', 'Actor no encontrado');
    }
    public function editar2(Actores $actor)
    {
        return view('editaractor', compact('actor'));  // Pasa el actor a la vista
    }
    public function actualizar2(Request $request, Actores $actor)
    {
        // Validar los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'biografia' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:masculino,femenino,otro',
            'nacionalidad' => 'required|string|max:100',
            'premios' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'biografia.required' => 'El campo biografía es obligatorio',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'genero.required' => 'El campo género es obligatorio',
            'nacionalidad.required' => 'El campo nacionalidad es obligatorio',
            'foto.image' => 'La foto debe ser una imagen válida',
        ]);

        // Si se ha subido una nueva foto, procesarla
        if ($request->hasFile('foto')) {
            // Eliminar la foto anterior si existe
            if (file_exists(public_path('imagenes/actores/' . $actor->foto))) {
                unlink(public_path('imagenes/actores/' . $actor->foto));  // Eliminar la foto anterior
            }

            // Guardar la nueva foto
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('imagenes/actores'), $foto);

            // Actualizar el actor con la nueva foto
            $actor->update([
                'nombre' => $request->nombre,
                'biografia' => $request->biografia,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
                'nacionalidad' => $request->nacionalidad,
                'premios' => $request->premios,
                'foto' => $foto,  // Actualizar con la nueva foto
            ]);
        } else {
            // Si no se sube una nueva foto, solo actualizar los campos no relacionados con la foto
            $actor->update([
                'nombre' => $request->nombre,
                'biografia' => $request->biografia,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'genero' => $request->genero,
                'nacionalidad' => $request->nacionalidad,
                'premios' => $request->premios,
            ]);
        }

        return redirect()->route('actores')->with('mensaje', 'Actor actualizado correctamente');
    }
    public function filtrar(Request $request)
{
    $buscar = $request->input('buscar');

    // Consulta para las películas
    $peliculas = Peliculas::query();

    // Consulta para los actores
    $actores = Actores::query();

    // Si existe un término de búsqueda
    if ($buscar) {
        // Filtro para películas
        $peliculas->where(function($query) use ($buscar) {
            $query->where('nombre', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('sinopsis', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('categoria', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('duracion', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('mayores_edad', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('fecha', 'LIKE', '%' . $buscar . '%');
        });

        // Filtro para actores
        $actores->where(function($query) use ($buscar) {
            $query->where('nombre', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('biografia', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('genero', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('nacionalidad', 'LIKE', '%' . $buscar . '%')
                  ->orWhere('premios', 'LIKE', '%' . $buscar . '%');
        });
    }

    // Obtener resultados de películas (con paginación)
    $peliculas = $peliculas->paginate(30);

    // Obtener resultados de actores (con paginación)
    $actores = $actores->paginate(30);

    // Pasar ambos resultados a la vista
    return view('index', compact('peliculas', 'actores'));
}

}
