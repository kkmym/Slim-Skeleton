<?php

namespace MyApp\Domain\Validator;

class UserRawPwValidator
{
    protected $minLength = PHP_INT_MIN;
    protected $maxLength = PHP_INT_MAX;
    protected $requireMixedCase;
    protected $requireSpecialChars;
    protected $requireDigits;
    protected $disallowRepeatChars;
    protected $requirePwnedPasswordsCheck;

    public function __construct()
    {
        /**
         * @todo 設定ファイルかなんかから読み取るようにする
         */
        $this->minLength = 8;
        $this->maxLength = 64;
        $this->requireMixedCase = true;
        $this->requireSpecialChars = true;
        $this->requireDigits = true;
        $this->disallowRepeatChars = false;
        $this->requirePwnedPasswordsCheck = false;
    }

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

        if (!$this->_containsSpecialChars($rawPw)) {
            return false;
        }

        if (!$this->_containsDigits($rawPw)) {
            return false;
        }

        if (!$this->_containsRepeatedChars($rawPw)) {
            return false;
        }

        if (!$this->_checkPwnedPasswords($rawPw)) {
            return false;
        }

        return true;
    }

    protected function _validateMinLength(string $rawPw)
    {
        if ($this->minLength <= mb_strlen($rawPw)) {
            return true;
        }

        return false;
    }

    protected function _validateMaxLength(string $rawPw)
    {
        if (mb_strlen($rawPw) <= $this->maxLength) {
            return true;
        }

        return false;
    }

    protected function _containsMixedCase(string $rawPw)
    {
        if (!$this->requireMixedCase) {
            return true;
        }

        if (preg_match('/[a-z]/', $rawPw) && preg_match('/[A-Z]/', $rawPw)) {
            return true;
        }

        return false;
    }

    protected function _containsDigits(string $rawPw)
    {
        if (!$this->requireDigits) {
            return true;
        }

        if (preg_match('/[0-9]/', $rawPw)) {
            return true;
        }

        return false;
    }

    /**
     * https://www.owasp.org/index.php/Password_special_characters
     */
    protected function _containsSpecialChars()
    {
        return true;
    }

    protected function _containsRepeatedChars(string $rawPw)
    {
        if (!$this->disallowRepeatChars) {
            return true;
        }

        $len = mb_strlen($rawPw);
        for ($i=0; $i<$len; $i++) {
            $c = mb_substr($rawPw, $i, 1);
            $haystick = mb_substr($rawPw, $i+1);
            if (strpos($haystick, $c) !== false) {
                return false;
            }
        }

        return true;
    }

    protected function _checkPwnedPasswords()
    {
        return true;
    }

}
