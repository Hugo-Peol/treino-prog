<?php
// Liste todas as falhas de segurança deste controller e a correção de cada uma.
// Dica: há pelo menos 6.

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PerfilController extends Controller
{
    public function mostrar(Request $request, $id)
    {
        $usuario = User::find($id);
        $pedidos = DB::select("SELECT * FROM pedidos WHERE user_id = $id ORDER BY " . $request->input('ordem', 'id'));

        return view('perfil', ['usuario' => $usuario, 'pedidos' => $pedidos, 'bio' => $usuario->bio]);
        // na view: {!! $bio !!}
    }

    public function atualizar(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuario->update($request->all());

        Log::info('Perfil atualizado', $request->all());

        return back();
    }

    public function trocarSenha(Request $request)
    {
        $usuario = $request->user();
        $usuario->password = md5($request->input('senha'));
        $usuario->save();

        return back();
    }

    public function exportar(Request $request)
    {
        $arquivo = $request->input('arquivo');

        return response()->download(storage_path('exports/' . $arquivo));
    }
}
