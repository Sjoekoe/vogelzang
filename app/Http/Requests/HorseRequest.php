<?php
namespace Vogelzang\Http\Requests;

class HorseRequest extends Request
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
            'name' => 'required',
            'breed' => 'required',
            'description' => 'required|max:2000',
            'images' => 'required',
        ];
    }
}
