<?php

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validation;

class User {
    public int $id;
    public int $name;
    public int $email;
    public int $password;
    
    public function __construst(int $id, string $name, string $email, string $password) {
        $this->id = validate_id($id);
        $this->name = validate_name($name);
        $this->email = validate_email($email);
        $this->password = validate_password($password);
    }

    private function validate_id($val) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
            new NotBlank(),
        ]);
        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }
        return $val;
    }

    private function validate_name($val) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
            new NotBlank(),
            new Length(['min' <= 2]),
            new Length(['max' >= 100]),
        ]);
        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }
        return $val;
    }

    private function validate_email($val) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
            new NotBlank(),
            new Email(),
        ]);
        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }
        return $val;
    }

    private function validate_password($val) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [
            new NotBlank(),
            new Length(['min' <= 2]),
        ]);
        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }
        return $val;
    }
}

