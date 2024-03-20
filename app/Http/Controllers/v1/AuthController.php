<?php


namespace App\Http\Controllers\v1;


use App\Http\Controllers\v1\BaseController as BaseController;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;


class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        Log::debug('inputs :', $input);
        $user = User::factory()->create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'UserController register successfully.');
    }


    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            return $this->sendResponse($success, 'UserController login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'unauthorised'], 401);
        }
    }

    public function operators()
    {
        $operators = User::get()->where('isOperator', '=', 1);
        return response()->json($operators);
    }
}
