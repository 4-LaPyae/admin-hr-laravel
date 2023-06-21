<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class EmployeeAttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
       
        if(request()->isMethod('post')){
            $rules = [
                "datetime"=>"required",
                "employee_id"=>"required",
            ];
        }elseif(request()->isMethod('put')){
            $rules = [
                "datetime"=>"required",
                "employee_id"=>"required",
                "status"=>"required"
            ];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            "datetime.required"=>"Date time is required!",
            "employee_id.required"=>"Employee Id is required!",
            "status.required"=>"Status is required"
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}