<?php
namespace Vogelzang\Http\Requests;

class UpdateUserRequest extends Request
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
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id,
            'username' => 'required|max:20|min:3|unique:users,username,' . $this->route('user')->id,
        ];
    }
}
