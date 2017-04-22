<?php
namespace App\Http\Validations;
use Illuminate\Validation\Factory;








abstract class BaseForm
{
    /**
     * @var Validator
     */
    protected $validation;

    /**
     * @var \Illuminate\Validation\Factory
     */
    private $validator;

    /**
     * @param \Illuminate\Validation\Factory $validator
     */
    public function __construct(ValidatorFactory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $formData
     *
     * @throws FormValidationException
     */
    public function validate(array $formData)
    {
        // Instantiate validator instance by factory
        $this->validation = $this->validator->make($formData, $this->rules());

        // Validate
        if ($this->validation->fails()) {
            throw new FormValidationException('Validation Failed', $this->getValidationErrors());
        }

        return true;
    }

    /**
     * @return MessageBag
     */
    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }

    /**
     * @return array
     */
    abstract protected function rules();
}

class FormValidationException extends \Exception
{
    /**
     * @var MessageBag
     */
    protected $errors;

    /**
     * @param string     $message
     * @param MessageBag $errors
     * @param int        $code
     * @param Exception  $previous
     */
    public function __construct($message = "", MessageBag $errors, $code = 0, Exception $previous = null)
    {
        $this->errors = $errors;

        parent::__construct($message, $code, $previous);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

?>