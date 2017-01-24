<?php
namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

class HomeController extends ManagerController
{
    public function __construct (Request $request) {
        parent::__construct($request);
        $this->middleware(['auth']/*, ['except' => ['show', 'index']]*/);
    }
    
    public function index (Request $request) {
        $userPermissions = json_decode($request->get('userPermissions'), true);
        
        return view('v1.home.index', [
            'userPermissions' => $userPermissions,
        ]);
    }
}