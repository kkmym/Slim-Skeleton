<?php

namespace MyApp\Domain\ValueObjects;

use MyApp\Domain\DomainExceptions\InvalidTypeException;

class UserLoginId
{
    protected $loginId;

    public function __construct(string $loginId)
    {
        if (!$this->_isValidLoginId($loginId)) {
            throw new InvalidTypeException('UserLoginId ' . $loginId . ' Invalid');
        }
        $this->loginId = $loginId;    
    }

    protected function _isValidLoginId(string $loginId)
    {
        // 文字列長（4〜32文字）
        $len = mb_strlen($loginId);
        if (($len < 4) || (32 < $len)) {
            return false;
        }

        // 文字種（アルファベット、数字)
        $validPattern = '^[a-zA-Z0-9]+$';
        if (!preg_match('/' . $validPattern . '/', $loginId)) {
            return false;
        }

        return true;
    }

    public function value()
    {
        return $this->loginId;    
    }
}
