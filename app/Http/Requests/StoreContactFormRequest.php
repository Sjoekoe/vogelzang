<?php
namespace Vogelzang\Http\Requests;

class StoreContactFormRequest extends Request
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
            'full_name' => 'required',
            'subject' => 'required|max:60|min:3',
            'email' => 'required|email',
            'q' => 'required|max:2000',
        ];
    }
}
