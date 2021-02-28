<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends Controller {

    private $salt;

    public function __construct(){
        $this->salt="userloginregister";
    }

    public function showAllUsers() {
        echo json_encode(User::all());
    }

    public function showOneUser($id) {
        echo json_encode(User::find($id));
    }

    public function register(Request $request){
        if ($request->has('username') && $request->has('password')) {
            $user = new User;
            $user->username=$request->input('username');
            $user->password=sha1($this->salt.$request->input('password'));
            $user->apiToken=Str::random(60);

            if($user->save()){
                http_response_code(200);
                echo json_encode($user) . "registration successful!";
            }
            else{
                http_response_code(404);
                return "User registration failed!";
            }
        }
        else{
            http_response_code(404);
            return "Please enter full user information!";
        }
    }

    public function isLoggedIn(Request $request){

        if ($request->has('apiToken')){
            $sarray=array();
            $sarray['user'] = User::where("apiToken", $request->input('apiToken'))->first();
            $sarray['roles'] = [];

            $roles = DB::table('usershasroles')
            ->join('role', 'usershasroles.role_id', '=', 'role.id')
            ->join('user', 'usershasroles.user_id', '=', 'user.id')
            ->where('apiToken', '=', $request->input('apiToken'))
            ->select('role.id', 'role.name')
            ->get();

            array_push($sarray['roles'], $roles);

            echo json_encode($sarray);

            //echo json_encode(['user' => User::where('apiToken', $request->input('apiToken'))->first()]);
        }
        else {
            http_response_code(404);
        }

    }

    public function login(Request $request){

        if ($request->has('username') && $request->has('password')) {
            $user = User:: where("username", "=", $request->input('username'))
            ->where("password", "=", sha1($this->salt.$request->input('password')))
            ->first();

            if ($user){
                $token=Str::random(60);
                $user->apiToken=$token;
                $user->save();
                http_response_code(200);
                // echo response()->json($user);
                $uarray=array();
                $uarray['id']=$user->id;
                $uarray['username']=$user->username;
                $uarray['apiToken']=$user->apiToken;
                $uarray['roles']=[];

                $roles = DB::table('usershasroles')
                    ->join('role', 'usershasroles.role_id', '=', 'role.id')
                    ->where('user_id', '=', $uarray['id']=$user->id)
                    ->select('role.id', 'role.name')
                    ->get();

                array_push($uarray['roles'], $roles);

                echo json_encode($uarray);

            }
            else{
                http_response_code(404);
                echo "The username or password is incorrect, login failed!";
            }
        }
        else{
            http_response_code(404);
            echo "The login information is incomplete, please enter your username and password to log in!";
        }
    }

    public function logout(){

        $user = Auth::user();
        $user->apiToken = null;
        $user->save();

        echo json_encode($user->username) . "successfully logged out!";
    }

    public function givePath(Request $request){

        $path = array();
        $path = [
            'ökljasdfökjhasdfa',
            'asdkjffdklngklfdb',
            'jadnfgnklejdvlkma'
        ];

        if ($request->has('username') && $request->has('role')) {
            echo json_encode();
        }
    }

}
