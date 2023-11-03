<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use http\Client\Response;

/**
 * @OA\Info(
 *     title="My First API",
 *     version="0.1"
 * )
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Responscde
     */
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return response()->json(['user' => $user]);
    }
    
    public function updateUser(Request $request)
    {
        
        $user = User::find($request->id);
        if($request->name != null) $user->name = $request->name;
        if($request->email != null) $user->email = $request->email;
        if($request->password != null) $user->password = Hash::make($request->password);
        if($request->role != null) $user->role = $request->role;
        if($request->name != null || $request->email != null || $request->password != null || $request->role != null) {
            $user->save();
        }
        
        return response()->json(['user' => $user]);
    }
    
    public function readUser(Request $request) {
        $user = User::find($request->id);
        return response()->json(['user' => $user]);
        
    }
    
    public function deleteUser(Request $request) {
        $user = User::find($request->id);
        $isDeleted = $user->delete();
        return response()->json(['result' => $isDeleted]);
        
    }
    
    /**
     * @OA\Get(
     *     path="/api/admin/user/list",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function list() {
        $users = User::all();
        return response()->json(['users' => $users]);
        
    }

}
