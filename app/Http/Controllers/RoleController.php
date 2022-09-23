<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Session;
use Purifier;
use Image;

class RoleController extends Controller
{
    public function create(Request $request) {
        $role = new Role;
        $role->user_id = $request->user_id;
        $role->role = $request->role;
        $role->save();
    }

    public function show() {
        $users = DB::table('users')
        ->leftJoin('roles', 'users.id', '=', 'role.user_id')
        ->get();

        return redirect()->route('roles.show', $users);
    }
}