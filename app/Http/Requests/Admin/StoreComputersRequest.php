<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreComputersRequest extends FormRequest
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
            'name' => 'min:2|max:50|required',
            'mac' => 'min:3|max:50|required|unique:computers,mac,'.$this->route('computer'),
            'os' => 'min:3|max:50|required',
            'owner' => 'min:1|max:50|required',
            'location_id' => 'required',
            'details' => 'min:2|max:255',
            'status' => 'required',
        ];
    }
}
