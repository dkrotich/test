<?php
class BankAccount
{
    private $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(){
        return $this->balance;
    }

    public function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
        }
        return $this;
    }
}

class SavingsAccount extends BankAccount
{
    private $interestRate;

    public function __construct($balance, $interestRate)
    {
        parent::__construct($balance);
        $this->interestRate = $interestRate;
    }

    public function addInterest(){
        $interest = $this->interestRate * $this->getBalance();
        $this->deposit($interest);
    }
}

$account = new SavingsAccount(200, 0.05);
$account->addInterest();
echo $account->getBalance();