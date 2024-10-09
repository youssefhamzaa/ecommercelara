<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categorie=Categorie::all();
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json("impossible d'afficher le liste des categories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $categorie=new Categorie([
                'nomcategorie'=>$request->input('nomcategorie'),
                'imagecategorie'=>$request->input('imagecategorie'),
            ]);
            $categorie->save();
            return response()->json($categorie);

        } catch (\Exception $e) {
            //throw $th;
            return response()->json($e->getMessage());
        }

    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $categorie=Categorie::findorFail($id);
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json("probleme de recupération");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $categorie=Categorie::findorFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);
        }catch(\Exception $e){
            return response()->json("probleme de recupération");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $categorie=Categorie::findorFail($id);
            $categorie->delete();
            return response()->json("categorie supprimé avec success");

        }catch(\Exception $e){
            return response()->json("probleme de suppression");
        }
    }
}
