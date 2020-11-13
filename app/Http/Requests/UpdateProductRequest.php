<?php

namespace App\Http\Requests;


class UpdateProductRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
	    return [
		    'name' => 'required|string|max:50',
            'description' => 'required|string|max:500',
            'categories' => 'required',
            'categories.*' => 'exists:categories,id',
	    ];
    }

	/**
	 * Custom message for validation
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'name.required' => 'Name is required!',
            'description.required' => 'Description is required!',
            'categories.required' => 'Categories is required!',
            'categories.exists' => 'Categories must be exists'
		];
	}
}
