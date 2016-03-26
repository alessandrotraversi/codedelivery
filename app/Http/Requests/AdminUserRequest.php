<?php
/**
 * Created by PhpStorm.
 * User: Traversi
 * Date: 26/03/2016
 * Time: 19:46
 */

namespace CodeDelivery\Http\Requests;


class AdminUserRequest extends Request
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
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ];
    }
}