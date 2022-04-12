<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $creationDate;

    public function __construct($id, $name, $email, $password)
    {
        
        $validator = Validation::createValidator();

            //Validate id
            $violations = $validator->validate($id, [
                new GreaterThan(['value' => -1]),
                new NotBlank(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Id error: ".$violation->getMessage().'<br>';
                }
            }

            //Validate username
            $violations = $validator->validate($name, [
                new Length(['min' => 2]),
                new NotBlank(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Name error: ".$violation->getMessage().'<br>';
                }
            }

            //Validate email
            $violations = $validator->validate($email, [
                new NotBlank(),
                new Email(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Email error: ".$violation->getMessage().'<br>';
                }
            }

            //Validate password
            $violations = $validator->validate($password, [
                new Length(['min' => 8]),
                new NotBlank(),
            ]);

            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    echo "Password error: ".$violation->getMessage().'<br>';
                }
            }
        

        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->creationDate = new DateTime();

        
    
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
}
