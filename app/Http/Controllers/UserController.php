<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiResponse;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use ApiResponse;
    public  function login(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only(['phone', 'password']))){
            return $this->respondForbidden(__('Incorrect credentials, login failed'));
        }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->respondAuthenticated(__('successfully login'), $user->id, $token);
    }
    function logout(): JsonResponse
    {
        Auth::logout();
        return $this->respondWithSuccess("successfully logout");
    }
    public function index(ListRequest $request): JsonResponse
    {
        $search = ucwords($request->input('search'), " ");
        $query = User::query()->where('lastname', 'like',  "%{$search}%")->orWhere('firstname', 'like', "%{$search}%")
            ->orderBy('lastname')->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('user', 2)]),
            $query->currentPage(), $query->lastPage(), UserResource::collection($query->items()));
    }

    public function show(User $user): JsonResponse
    {
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('user', 1)]), $user);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('user', 1)]));
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('user', 1)]));
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('user', 1)]));
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $phone = $request->phone;
        $user = User::where('phone', $phone)->firstOrFail();
        $newPassword = "user_".Str::random(8);
        $user->update([
            'password' => bcrypt($newPassword)
        ]);
        Mail::to($user->email)->send(new PasswordResetMail($user, $newPassword));
        Auth::logout();
        return $this->respondWithSuccess("Mot de passe réinitialisé avec succes");
    }

    public function updateUserPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:5|max:15',
            'password' => 'required|string|min:5|max:15|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()){
            return $this->respondFailedValidation($validator->errors());
        }
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return $this->respondFailedValidation($validator->errors(), 'Le mot de passe courant est incorrect.');
        }
        $user->update([
            'password' => bcrypt($request->password)
        ]);
        Auth::logout();
        return $this->respondWithSuccess("votre mot de passe a été mis a jour avec succes");
    }
}
