<?php

Interface iRegister {
    public function setRegister():bool;
    public function checkRegisterConsistency(): array;
    public function registerUser(): bool;
}