<?php
namespace Vogelzang\Http\Requests;

class ReplyToContactFormRequest extends Request
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
            'reply' => 'required',
        ];
    }
}
