<?php

namespace App\Http\Requests;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;


class ControladorProductoRequest extends FormRequest
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
   
    public function attributes()
    {
        return [           
            'id_producto' => 'id_producto',            
            'nombre' => 'Nombre',
        ];
    }
    
    
    
        public function messages()
        {
            return [
                'id_producto.required' => 'El id del producto es obligatorio.',
                'nombre.required' => 'El nombre es obligatorio',
                
            ];
        }
    public function rules()
    {
        return [            
            'nombre' => 'required|string',            
                       
        ];
    }
    

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(["estado"=>"error",'mensaje' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
