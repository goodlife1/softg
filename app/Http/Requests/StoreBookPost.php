<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
class StoreBookPost extends FormRequest
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
    public function messages()
    {
        return [
            'required' => 'Всі поля мають бути заповненні.',
            'publishing_year.after'=>"Рік бає буит з 1200 року "
        ];
    }

    public function rules()
    {
        $date = Carbon::now();
        $min_year =1452;
        return [
            'name' => 'required|min:5',
            'count_pages'=>'required|Integer|min:2',
            'author_id'=>'required',
            'genres_id'=>'required',
            'publishing_year'=>'date_format:Y|before:'.$date->year.'|after:'.$min_year
        ];
    }
}
