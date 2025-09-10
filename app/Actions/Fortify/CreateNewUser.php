<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, mixed>  $input
     * @return mixed
     */

    public function create(array $input): mixed
    {
        try {
            return DB::transaction(function () use ($input) {
                $guard = config('fortify.guard');

                $validator = Validator::make($input, [
                    'name' => ['required', 'string', 'max:255', Rule::unique(User::class)],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        Rule::unique('admin'),
                    ],
                    'password' => $this->passwordRules(),
                ]);

                if ($validator->fails()) {
                    throw new \InvalidArgumentException(implode("\n", $validator->errors()->all()));
                }

                $user = null;
                if ($guard === 'admin') {
                    $admin = new Admin();
                    $admin->email = $input['email'];
                    $admin->password = Hash::make($input['password']);
                    $isSaved = $admin->save();

                    if ($isSaved) {
                        $user = new User();
                        $this->fillUserData($user, $input, $admin);
                    }
                }
                return $user;
            });
        } catch (\Exception $e) {
            throw new \InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Fill the user data.
     *
     * @param  \App\Models\User  $user
     * @param  array<string, mixed>  $input
     * @param  \App\Models\Role  $role
     * @return void
     */
    private function fillUserData(User $user, array $input, $role): void
    {
        $user->name = $input['name'];
        $user->mobile = $input['mobile'];
        $user->address = $input['address'];
        $user->city = $input['city'];
        $user->status = $input['status'];
        $user->birthday = $input['birthday'];
        $user->gender = $input['gender'];

        if (isset($input['image'])) {
            $imageName = time() . 'image.' . pathinfo($input['image'], PATHINFO_EXTENSION);
            file_put_contents('storage/images/' . $role->getTable() . '/' . $imageName, file_get_contents($input['image']));
            $user->image = $imageName;
        }

        $user->userable()->associate($role);
        $user->save();
    }
}
