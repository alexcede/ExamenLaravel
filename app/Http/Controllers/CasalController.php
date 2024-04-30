<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;
use App\Http\Requests\StorecasalRequest;
use App\Http\Requests\UpdatecasalRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CasalController extends Controller
{
    public function allCasals() {
        $casals = Casal::getAllCasals();

        return view('casals', ['casals' => $casals]);
    }

    public function delete($id) {
        Casal::deleteCasal($id);

        return redirect()->route('user.casals');
    }

    public function edit($id) {
        $casal = Casal::getCasal($id);
        $ciutats = Ciutat::getCiutats();

        return view('editarCasal', compact('casal', 'ciutats'));
    }

    public function update(Request $request, $id) {

        $request->validate([
            'nom' => 'required|unique:casals,nom,'.$id,
            'data_inici' => 'required|date',
            'data_final' => 'required|date|after:data_inici',
            'n_places' => 'required|integer|min:1',
            'id_ciutat' => 'required|exists:ciutats,id',
        ] , [
            'nom.required' => 'El campo nombre es obligatorio.',
            'data_inici.required' => 'El campo fecha de inicio es obligatorio.',
            'data_final.required' => 'El campo fecha final es obligatorio.',
            'n_places.required' => 'El campo número de plazas es obligatorio.',
            'id_ciutat.required' => 'El campo ciudad es obligatorio.',
            'data_final.after' => 'La fecha final debe de ser posterior a la fecha inicial.'
        ]);

        $casal = Casal::getCasal($id);

        Casal::updateCasal($casal, $request->input('nom'), $request->input('data_inici'), $request->input('data_final'), $request->input('n_places'), $request->input('id_ciutat'));

        return redirect()->route('user.casals');
    }
    public function create() {
        $ciutats = Ciutat::all(); 
        return view('crearCasal', compact('ciutats'));
    }
    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|unique:casals,nom',
            'data_inici' => 'required|date',
            'data_final' => 'required|date|after:data_inici',
            'n_places' => 'required|integer|min:1',
            'id_ciutat' => 'required|exists:ciutats,id',
        ] , [
            'nom.required' => 'El campo nombre es obligatorio.',
            'data_inici.required' => 'El campo fecha de inicio es obligatorio.',
            'data_final.required' => 'El campo fecha final es obligatorio.',
            'n_places.required' => 'El campo número de plazas es obligatorio.',
            'id_ciutat.required' => 'El campo ciudad es obligatorio.',
            'data_final.after' => 'La fecha final debe de ser posterior a la fecha inicial.'
        ]);

        $data = $request->only(['nom', 'data_inici', 'data_final', 'n_places', 'id_ciutat']);

        Casal::storeCasal($data);

        return redirect()->route('user.casals');
    }
}
