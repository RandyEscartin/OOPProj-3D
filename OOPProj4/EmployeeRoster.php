<?php

class EmployeeRoster {
    private $roster;

    public function __construct($rosterSize) {
        $this->roster = array_fill(0, $rosterSize, null);
    }

    public function add(Employee $e) {
 
        if ($this->count() < count($this->roster)) {
            for ($i = 0; $i < count($this->roster); $i++) {
                if (is_null($this->roster[$i])) {
                    $this->roster[$i] = $e;
                    return;
                }
            }
        } else {
            echo "Roster is full.\n";
        }
    }


    public function remove($employeeNumber) {
        if ($employeeNumber >= 1 && $employeeNumber <= count($this->roster)) {
            $index = $employeeNumber - 1;
            unset($this->roster[$index]);
            $this->roster = array_values($this->roster);
            echo "Employee removed successfully.\n";
        } else {
            echo "Invalid employee number.\n";
        }
    }

    public function count() {
        $count = 0;
        foreach ($this->roster as $employee) {
            if (!is_null($employee)) {
                $count++;
            }
        }
        return $count;
    }

    public function countCE() {
        $count = 0;
        foreach ($this->roster as $employee) {
            if (!is_null($employee) && $employee instanceof CommissionEmployee) {
                $count++;
            }
        }
        return $count;
    }

    public function countHE() {
        $count = 0;
        foreach ($this->roster as $employee) {
            if (!is_null($employee) && $employee instanceof HourlyEmployee) {
                $count++;
            }
        }
        return $count;
    }

    public function countPE() {
        $count = 0;
        foreach ($this->roster as $employee) {
            if (!is_null($employee) && $employee instanceof PieceWorker) {
                $count++;
            }
        }
        return $count;
    }

    public function display() {
        echo "***List of Employees***\n";
        for ($i = 1; $i <= count($this->roster); $i++) {
            if (!is_null($this->roster[$i - 1])) {
                echo "Employee " . $i . ":\n" . $this->roster[$i - 1] . "\n";
            }
        }
    }

    public function displayCE() {
        echo "***List of Commission Employees***\n";
        for ($i = 1; $i <= count($this->roster); $i++) {
            if (!is_null($this->roster[$i - 1]) && $this->roster[$i - 1] instanceof CommissionEmployee) {
                echo "Employee " . $i . ":\n" . $this->roster[$i - 1] . "\n";
            }
        }
    }

    public function displayHE() {
        echo "***List of Hourly Employees***\n";
        for ($i = 1; $i <= count($this->roster); $i++) {
            if (!is_null($this->roster[$i - 1]) && $this->roster[$i - 1] instanceof HourlyEmployee) {
                echo "Employee " . $i . ":\n" . $this->roster[$i - 1] . "\n";
            }
        }
    }

    public function displayPE() {
        echo "***List of Piece Workers***\n";
        for ($i = 1; $i <= count($this->roster); $i++) {
            if (!is_null($this->roster[$i - 1]) && $this->roster[$i - 1] instanceof PieceWorker) {
                echo "Employee " . $i . ":\n" . $this->roster[$i - 1] . "\n";
            }
        }
    }

    public function payroll() {
        echo "***Payroll***\n";
        for ($i = 1; $i <= count($this->roster); $i++) {
            if (!is_null($this->roster[$i - 1])) {
                echo "Employee " . $i . ":\n";
                echo "Earnings: " . $this->roster[$i - 1]->earnings() . "\n";
            }
        }
    }
}