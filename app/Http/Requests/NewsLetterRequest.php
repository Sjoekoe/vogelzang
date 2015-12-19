<?php
namespace Vogelzang\Http\Requests;

class NewsLetterRequest extends Request
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
            'subject' => 'required',
            'body' => 'required',
        ];
    }
}
