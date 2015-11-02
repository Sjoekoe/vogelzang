<?php
namespace Vogelzang\Http\Requests;

class StoreItemsRequest extends Request
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
            'title' => 'required|min:3|max:50',
            'message' => 'required|max:2000',
            'image' => 'image',
        ];
    }
}
