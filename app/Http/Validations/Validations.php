<?php 
namespace App\Http\Validations;
use App\Http\Validations\BaseForm;
use Illuminate\Validation\Factory;




class Login extends BaseForm
{
	/**
     * @return array
     */
    protected function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|alpha'
        ];
    }
}
class Register extends BaseForm
{
	  protected function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|alpha'
        ];
    }

}



 ?>