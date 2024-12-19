<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\File;
use App\Models\Peticione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;



class PeticioneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index(Request $request)
    {
        $peticiones = Peticione::all();
        return view('peticiones.index', compact('peticiones'));
    }

    public function listMine(Request $request){
        $user= Auth::user();
        $peticiones = Peticione::where('user_id',$user->id)->get();
        return view('peticiones.index', compact('peticiones'));
    }

    public function show(Request $request, $id){
        $peticion = Peticione::findOrFail($id);
        return view('peticiones.show', compact('peticion'));
    }
    public function show2(Peticione $id){
        return view('peticiones.show', compact('id'));
    }

    public function create(request $request){
        return view('peticiones.edit-add');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'destinatario' => 'required',
            'categoria' => 'required',
            //'file' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors("Error validando la peticion")->withInput();
        }
        $input = $request->all();
        try{
            $category = Categoria::findOrFail($input['categoria']);
            $user = Auth::user();
            $peticion = new Peticione($input);
            $peticion->categoria()->associate($category);
            $peticion->user()->associate($user);
            $peticion->firmantes = 0;
            $peticion->estado = 'pendiente';
            $res=$peticion->save();

            if ($res){
                $res_file = $this->fileUpload($request, $peticion->id);
                if ($res_file == 0){
                    return redirect('/mispeticiones');
                }
                return back()->withErrors("Error al crear la peticion")->withInput();
            }

        }catch (\Exception $exception){
            return back()->withError( $exception->getMessage())->withInput();
        }
    }

    public function fileUpload(Request $request, $peticione_id = null): int|File{
        $file = $request->file('file');
        $fileModel = new File();
        $fileModel->peticione_id = $peticione_id;
        if($request->hasFile('file')){
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('imagenes/peticiones', $filename, 'local');
            $fileModel->name = $filename;
            $fileModel->file_path = $filePath;
            $res = $fileModel->save();
            if($res){
                return 0;
            }else{
                return 1;
            }
        }
        return 1;
    }

    public function firmar(Request $request, $id)
    {
        try {
            $peticion = Peticione::findOrFail($id);
            $user = Auth::user();
            $firmas = $peticion->firmas??[];
            foreach ($firmas as $firma) {
                if ($firma->id == $user->id) {
                    return back()->withError( "Ya has firmado esta petición")->withInput();
                }
            }
            $user_id = [$user->id];
            $peticion->firmas()->attach($user_id);
            $peticion->firmantes = $peticion->firmantes + 1;
            $peticion->save();
        }catch (\Exception $exception){
            return back()->withError( $exception->getMessage())->withInput();
        }
        return redirect()->back();
    }




}
