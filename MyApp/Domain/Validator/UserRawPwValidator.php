<?php

namespace MyApp\Domain\Validator;

class UserRawPwValidator
{
    public function validate(string $rawPw)
    {
        if (!$this->_validateMinLength($rawPw)) {
            return false;
        }

        if (!$this->_validateMaxLength($rawPw)) {
            return false;
        }

        if (!$this->_containsMixedCase($rawPw)) {
            return false;
        }

        if (!$this->_containsDigits($rawPw)) {
            return false;
        }

        if (!$this->_containsSpecialChars($rawPw)) {
            return false;
        }

        if (!$this->_checkPwnedPasswords($rawPw)) {
            return false;
        }

        return true;
    }

    protected function _validateMinLength()
    {
        return true;
    }

    protected function _validateMaxLength()
    {
        return true;
    }

    protected function _containsMixedCase()
    {
        return true;
    }

    protected function _containsDigits()
    {
        return true;
    }

    /**
     * https://www.owasp.org/index.php/Password_special_characters
     */
    protected function _containsSpecialChars()
    {
        return true;
    }

    protected function _checkPwnedPasswords()
    {
        return true;
    }

}
