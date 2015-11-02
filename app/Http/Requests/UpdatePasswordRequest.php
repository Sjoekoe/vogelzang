<?php
namespace Vogelzang\Http\Requests;

class UpdatePasswordRequest extends Request
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|min:6',
            'password_again' => 'required|same:password',
        ];
    }
}
