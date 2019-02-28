<?php namespace ClaudiusNascimento\DynamicBlocks\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DynamicBlockRequest extends FormRequest {



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

		$this->errorBag = $this->has('errorBag') ? $this->get('errorBag') : 'default';

		$this->merge(['active' => $this->has('active')]);
		
		$rule = [
			'rel' => 'required',
			'rel_id' => 'required'
		];

		return $rule;
	}

	public function messages()
	{
		return array(
			'rel.required' => 'No relation key detected',
			'rel_id.required' => 'No relation detected'
		);
	}

}