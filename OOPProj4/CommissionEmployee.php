<?php

class CommissionEmployee extends Employee {
    private $regularSalary;
    private $itemSold;
    private $commissionRate;

    public function __construct($name, $address, $age, $companyName, $regularSalary, $itemSold, $commissionRate) {
        parent::__construct($name, $address, $age, $companyName);
        $this->regularSalary = $regularSalary;
        $this->itemSold = $itemSold;
        $this->commissionRate = $commissionRate;
    }

    public function getRegularSalary() {
        return $this->regularSalary;
    }

    public function getItemSold() {
        return $this->itemSold;
    }

    public function getCommissionRate() {
        return $this->commissionRate;
    }

    public function setRegularSalary($regularSalary) {
        $this->regularSalary = $regularSalary;
    }

    public function setItemSold($itemSold) {
        $this->itemSold = $itemSold;
    }

    public function setCommissionRate($commissionRate) {
        $this->commissionRate = $commissionRate;
    }

    public function earnings() {
        return $this->regularSalary + ($this->itemSold * $this->commissionRate);
    }

    public function __toString() {
        return parent::__toString() .
               "Regular Salary: " . $this->regularSalary . "\n" .
               "Item Sold: " . $this->itemSold . "\n" .
               "Commission Rate: " . $this->commissionRate . "\n";
    }
}