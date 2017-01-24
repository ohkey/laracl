<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
use App\Permission;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;
use Illuminate\Support\Facades\DB;

class Permissions extends BaseEncrypter
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    
    public function handle($request, Closure $next, $guard = null)
    {
        $userPermissions = DB::table('users')->select('permissions.*')
                                             ->leftJoin('role_user','users.id','=','role_user.user_id')
                                             ->leftJoin('permission_role','role_user.role_id','=','permission_role.role_id')
                                             ->leftJoin('permissions','permission_role.permission_id','=','permissions.id')
                                             ->where('users.id', Auth::id())
                                             ->groupBy('permissions.id')
                                             ->get()
                                             ->toJson();
        
        $request->attributes->add(compact('userPermissions'));
        
        /*$userRole = User::where('id', Auth::id())->with(['roles'])->firstOrFail()->toArray();
        dump($userRole);die;
        foreach ($userRole['roles'] as $k => $role) {
            $rolePermission = Role::where('id', $role['id'])->with(['permissions'])->firstOrFail()->toArray();
            /*foreach () {
                
            }
            dump($rolePermission);
        }die;
        dump($userRole);die;
        $rolePermission = Role::where('id', 2)->with(['permissions'])->get()->toArray();
        $request->attributes->add(compact('userRole'));
        $request->attributes->add(compact('rolePermission'));*/
    
        return $next($request);
    }
}