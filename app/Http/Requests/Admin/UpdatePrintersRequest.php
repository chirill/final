<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrintersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name' => 'min:3|max:50|required',
            'model' => 'min:3|max:50|required',
            'mac' => 'min:3|max:50|required|unique:printers,mac,'.$this->route('printer'),
            'ip' => 'min:5|max:50|required',
            'location_id' => 'required',
        ];
    }
}
