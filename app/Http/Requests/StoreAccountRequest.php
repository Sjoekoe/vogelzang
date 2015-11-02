<?php
namespace Vogelzang\Http\Requests;

class StoreAccountRequest extends Request
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
            'email' => 'required|email|unique:users',
            'username' => 'required|max:20|min:3|unique:users',
        ];
    }
}
