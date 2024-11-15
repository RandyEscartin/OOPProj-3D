<?php

class HourlyEmployee extends Employee {
    private $hoursWorked;
    private $rate;

    public function __construct($name, $address, $age, $companyName, $hoursWorked, $rate) {
        parent::__construct($name, $address, $age, $companyName);
        $this->hoursWorked = $hoursWorked;
        $this->rate = $rate;
    }

    public function getHoursWorked() {
        return $this->hoursWorked;
    }

    public function getRate() {
        return $this->rate;
    }

    public function setHoursWorked($hoursWorked) {
        $this->hoursWorked = $hoursWorked;
    }

    public function setRate($rate) {
        $this->rate = $rate;
    }

    public function earnings() {
        if ($this->hoursWorked > 40) {
            $overtimeHours = $this->hoursWorked - 40;
            $overtimeRate = $this->rate * 1.5;
            return (40 * $this->rate) + ($overtimeHours * $overtimeRate);
        } else {
            return $this->hoursWorked * $this->rate;
        }
    }

    public function __toString() {
        return parent::__toString() .
               "Hours Worked: " . $this->hoursWorked . "\n" .
               "Rate: " . $this->rate . "\n";
    }
}