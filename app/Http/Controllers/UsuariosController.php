<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UsuariosController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }


    public function index(Request $request){

        $presquisar = $request->pesquisar;
        $findUsuario = $this->user->getUsuarioPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.usuario.paginacao', compact('findUsuario'));
    }

    public function delete(Request $request){
    
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();
        Toastr::warning('Usuário excluido com sucesso','Deletado',["positionClass"=>"toast-top-right","progressBar" => true]);
        
        return response()->json(['success'=>true]);

    }

    
    public function cadastrarUsuario(Request $request){
        
        if($request->method() == 'POST'){

            $data = $request->all();
            $data['password']=encrypt($data['password']);
            User::create($data);
            Toastr::success('Usuário cadastrado com Sucesso','Cadastro',["positionClass"=>"toast-top-right","progressBar" => true]);
            
            return redirect()->route('usuarios.index');
        };
        
        return view('pages.usuario.create');

    }

    public function atualizarUsuario(Request $request, $id){

       if($request->method() === "PUT"){
           $data = $request->all();
           $registro = User::find($id);
           $data['password']=encrypt($data['password']);
           $registro->update($data);
           Toastr::success('Usuário atualizado com Sucesso','Atualizado',["positionClass"=>"toast-top-right","progressBar" => true]);

           return redirect()->route('usuarios.index');
       };
            
       
        $findUsuario = User::where('id', '=', $id)->first();
        try{
            $senha = decrypt($findUsuario->password);
            
        } catch(\Illuminate\Contracts\Encryption\DecryptException $e){
            $senha =  $findUsuario->password;
            
        }
        
        
        return view('pages.usuario.atualiza', compact('findUsuario','senha'));
    }

}
