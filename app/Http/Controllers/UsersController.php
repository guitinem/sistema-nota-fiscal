<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Remove Admin Master
        $users = DB::table('users')->where([
            ['name', '<>', 'admin'],
            ["email", '<>', "teste.admin@gmail.com"],
            ['id', '<>', Auth::user()->id]
        ])->get();

        return view('dashboard.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $isValid = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (!$isValid) {
            return view('dashboard.user.create', [
                'error_message' => 'Verifique os valores passados e tente novamente'
            ]);
        }


        // Validando user admin
        if ($request->input('name') == env('ADMIN_NAME', 'admin') || $request->input('email') == env('ADMIN_EMAIL', 'teste.admin@gmail.com')) {
            return view('dashboard.user.create', [
                'error_message' => 'O usuário admin e
                    o email teste.admin@gmail.com estão reservados
                    Utilize outras credenciais
                    '
            ]);
        }

        $isNewEmail = User::where('email', $request->input('email'))->get();

        if (count($isNewEmail) != 0) {
            return view('dashboard.user.create', [
                'error_message' => 'Email já cadastrado no sistema!'
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->input('password'));
        User::create($input);

        return view('dashboard.user.create', [
            'success' => 'Cadastro concluído'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userToUpdate = User::find($id);
        $dontCheckEmail = false;

        if (!$request->input('name') && !$request->input('email')) {
            return view('dashboard.user.edit', [
                'error_message' => 'Email já cadastrado no sistema!',
                'user' => $userToUpdate
            ]);
        }

        // Validando valores de usuario admin
        if ($request->input('name') == env('ADMIN_NAME', 'admin') || $request->input('email') == env('ADMIN_EMAIL', 'teste.admin@gmail.com')) {
            return view('dashboard.user.edit', [
                'error_message' => 'O usuário admin e
                    o email teste.admin@gmail.com estão reservados
                    Utilize outras credenciais',
                'user' =>  $userToUpdate
            ]);
        }

        if ($userToUpdate->email == $request->input('email')) {
            $userToUpdate->name = $request->input('name');
            $dontCheckEmail = true;
        }

        if (!$dontCheckEmail) {
            // Validando email
            $isNewEmail = User::where('email', $request->input('email'))->get();

            if (count($isNewEmail) != 0) {
                return view('dashboard.user.edit', [
                    'error_message' => 'Email já cadastrado no sistema!',
                    'user' => $userToUpdate
                ]);
            }
        }

        $userToUpdate->name = $request->input('name');
        $userToUpdate->email = $request->input('email');

        $userToUpdate->save();

        return view('dashboard.user.edit', [
            'success' => 'Usuário Alterado com sucesso',
            'user' => $userToUpdate
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'user not found'
            ], 404);
        }

        $user->delete();

        return response('', 204);
    }
}
