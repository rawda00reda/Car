<?php

namespace App\Http\Controllers;

use App\CenterSpecials;
use App\mainBranch;
use App\MaintancePhoto;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','signup']]);
    }

    public function signup (Request $request)
    {


        $image = request('logo');
        $imagee = time() . '.' .$image->getClientOriginalExtension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->save(public_path('images/' .$imagee));

        if($request->lang==="ar"){
            $validator = Validator::make($request->all(), [
                'shopAr' => ['string', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'mobile' => ['required', 'max:255', 'unique:users'],
                'ownerAr' => [ 'string', 'max:255'],
                'logo' => [ 'image'],
                'employee_id' => [ 'max:255'],
            ]);
            if ($validator->fails()) {
                return response()->json( "fail");
            }

            $user = new User([
                'shopAr' => $request->shopName,
                'ownerAr' => $request->ownerName,
                'mobile' => $request->mobile,
                'logo' =>time() . '.' .$request->logo->getClientOriginalExtension(),
                'special' => $request->special,
                'employee_id' => $request->employee_id,
                'password' => Hash::make($request->password),
            ]);
            $user->save();

            $branch = new mainBranch([
                'streetAr' => $request->street,
                'technicianAr' => $request->techs,
                'phone' => $request->phone,
                'lat' => $request->lat,
                'long' => $request->longe,
                'country_id' => $request->country,
                'city_id' => $request->city,
                'user_id' => $user->id,

            ]);
            $branch->save();

            foreach($request->spe as $specs){
                $specials= new CenterSpecials([
                    'user_id' => $user->id,
                    'special_id' => $specs
                ]);
                $specials->save();
            }

        }


        if($request->lang==="en"){
            $validator = Validator::make($request->all(), [
                'shopAr' => ['string', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'mobile' => ['required', 'max:255', 'unique:users'],
                'ownerAr' => [ 'string', 'max:255'],
                'logo' => [ 'image'],
                'employee_id' => [ 'max:255'],
            ]);
            if ($validator->fails()) {
                return response()->json(['code' => 0, 'errors' => $validator->errors()], 200);
            }
            $user = new User([
                'shopEn' => $request->shopName,
                'ownerEn' => $request->ownerName,
                'mobile' => $request->mobile,
                'logo' =>time() . '.' .$request->logo->getClientOriginalExtension(),
                'special' => $request->special,
                'employee_id' => $request->employee_id,
                'password' => Hash::make($request->password),
            ]);
            $user->save();

            $branch = new mainBranch([
                'streetEn' => $request->street,
                'technicianEn' => $request->techs,
                'phone' => $request->phone,
                'lat' => $request->lat,
                'long' => $request->longe,
                'country_id' => $request->country,
                'city_id' => $request->city,
                'user_id' => $user->id,

            ]);
            $branch->save();

            foreach($request->spe as $specs){
                $specials= new CenterSpecials([
                    'user_id' => $user->id,
                    'special_id' => $specs
                ]);
                $specials->save();
            }

        }

        if($request->lang==="ur"){
            $validator = Validator::make($request->all(), [
                'shopUr' => ['string', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'mobile' => ['required', 'max:255', 'unique:users'],
                'ownerUr' => [ 'string', 'max:255'],
                'logo' => [ 'image'],
                'employee_id' => [ 'max:255'],
            ]);
            if ($validator->fails()) {
                return response()->json(  $validator->errors());
            }
            $user = new User([
                'shopUr' => $request->shopName,
                'ownerUr' => $request->ownerName,
                'mobile' => $request->mobile,
                'logo' =>time() . '.' .$request->logo->getClientOriginalExtension(),
                'special' => $request->special,
                'employee_id' => $request->employee_id,
                'password' => Hash::make($request->password),
            ]);
            $user->save();

            $branch = new mainBranch([
                'streetUr' => $request->street,
                'technicianUr' => $request->techs,
                'phone' => $request->phone,
                'lat' => $request->lat,
                'long' => $request->longe,
                'country_id' => $request->country,
                'city_id' => $request->city,
                'user_id' => $user->id,

            ]);
            $branch->save();
            foreach($request->spe as $specs){
                $specials= new CenterSpecials([
                    'user_id' => $user->id,
                    'special_id' => $specs
                ]);
                $specials->save();
            }

        }

        foreach($request->file('img') as $imagee){
            $imagee = time() . '.' .$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->save(public_path('images/' .$imagee));

            $photos = new MaintancePhoto([
                'user_id' => $user->id,
                'img' => $imagee,
            ]);
            $photos->save();

        }

        return response()->json( "Success");
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['mobile', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        dd('hi');
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
