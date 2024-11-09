<?php

class Main {

    private EmployeeRoster $roster;
    private $size;
    private $repeat;

    public function start() {
        $this->clear();
        $this->repeat = true;

        $this->size = readline("Enter the size of the roster: ");

        if ($this->size < 1) {
            echo "Invalid input. Please try again.\n";
            readline("Press \"Enter\" key to continue...");
            $this->start();
        } else {
            $this->roster = new EmployeeRoster($this->size);
            $this->entrance();
        }
    }

    public function entrance() {
        $choice = 0;

        while ($this->repeat) {
            $this->clear();
            $this->menu();
            $choice = readline("Select Menu: ");

            switch ($choice) {
                case 1:
                    $this->addMenu();
                    break;
                case 2:
                    $this->deleteMenu();
                    break;
                case 3:
                    $this->otherMenu();
                    break;
                case 0:
                    $this->repeat = false;
                    break;
                default:
                    echo "Invalid input. Please try again.\n";
                    readline("Press \"Enter\" key to continue...");
                    break;
            }
        }
        echo "Process terminated.\n";
        exit;
    }

    public function menu() {
        echo "*** EMPLOYEE ROSTER MENU ***\n";
        echo "[1] Add Employee\n";
        echo "[2] Delete Employee\n";
        echo "[3] Other Menu\n";
        echo "[0] Exit\n";
    }

    public function addMenu() {
        $name = readline("Enter name: ");
        $address = readline("Enter address: ");
        $age = readline("Enter age: ");
        $companyName = readline("Enter company name: ");

        $this->empType($name, $address, $age, $companyName);
    }

    public function empType($name, $address, $age, $companyName) {
        $this->clear();
        echo "---Employee Details \n";
        echo "Enter name: $name\n";
        echo "Enter address: $address\n";
        echo "Enter company name: $companyName\n";
        echo "Enter age: $age\n";
        echo "[1] Commission Employee       [2] Hourly Employee       [3] Piece Worker\n";
        $type = readline("Type of Employee: ");

        switch ($type) {
            case 1:
                $this->addOnsCE($name, $address, $age, $companyName);
                break;
            case 2:
                $this->addOnsHE($name, $address, $age, $companyName);
                break;
            case 3:
                $this->addOnsPE($name, $address, $age, $companyName);
                break;
            default:
                echo "Invalid input. Please try again.\n";
                readline("Press \"Enter\" key to continue...");
                $this->empType($name, $address, $age, $companyName);
                break;
        }
    }

    public function addOnsCE($name, $address, $age, $companyName) {
        $regularSalary = readline("Enter regular salary: ");
        $itemSold = readline("Enter number of items sold: ");
        $commissionRate = readline("Enter commission rate: ");
        $employee = new CommissionEmployee($name, $address, $age, $companyName, $regularSalary, $itemSold, $commissionRate);
        $this->roster->add($employee);
        $this->repeat();
    }

    public function addOnsHE($name, $address, $age, $companyName) {
        $hoursWorked = readline("Enter hours worked: ");
        $rate = readline("Enter rate: ");
        $employee = new HourlyEmployee($name, $address, $age, $companyName, $hoursWorked, $rate);
        $this->roster->add($employee);
        $this->repeat();
    }

    public function addOnsPE($name, $address, $age, $companyName) {
        $numberItems = readline("Enter number of items: ");
        $wagePerItem = readline("Enter wage per item: ");
        $employee = new PieceWorker($name, $address, $age, $companyName, $numberItems, $wagePerItem);
        $this->roster->add($employee);
        $this->repeat();
    }

    public function deleteMenu() {
        $this->clear();

        echo "***List of Employees on the current Roster***\n";
        $this->roster->display();

        echo "\n[0] Return\n";
        $employeeNumber = readline("Enter employee number to delete (or 0 to return): ");

        if ($employeeNumber >= 1 && $employeeNumber <= $this->roster->count()) {
            $this->roster->remove($employeeNumber - 1);
            readline("Press \"Enter\" key to continue...");
            $this->deleteMenu();
        } elseif ($employeeNumber == 0) {
            $this->entrance();
        } else {
            echo "Invalid employee number.\n";
            readline("Press \"Enter\" key to continue...");
            $this->deleteMenu();
        }
    }

    public function otherMenu() {
        $this->clear();
        echo "[1] Display\n";
        echo "[2] Count\n";
        echo "[3] Payroll\n";
        echo "[0] Return\n";
        $choice = readline("Select Menu: ");

        switch ($choice) {
            case 1:
                $this->displayMenu();
                break;
            case 2:
                $this->countMenu();
                break;
            case 3:
                $this->roster->payroll();
                readline("Press \"Enter\" key to continue...");
                $this->otherMenu();
                break;
            case 0:
                $this->entrance();
                break;
            default:
                echo "Invalid input. Please try again.\n";
                readline("Press \"Enter\" key to continue...");
                $this->otherMenu();
                break;
        }
    }

    public function displayMenu() {
        $this->clear();
        echo "[1] Display All Employee\n";
        echo "[2] Display Commission Employee\n";
        echo "[3] Display Hourly Employee\n";
        echo "[4] Display Piece Worker\n";
        echo "[0] Return\n";
        $choice = readline("Select Menu: ");

        switch ($choice) {
            case 0:
                $this->otherMenu();
                break;
            case 1:
                $this->roster->display();
                readline("Press \"Enter\" key to continue...");
                $this->displayMenu();
                break;
            case 2:
                $this->roster->displayCE();
                readline("Press \"Enter\" key to continue...");
                $this->displayMenu();
                break;
            case 3:
                $this->roster->displayHE();
                readline("Press \"Enter\" key to continue...");
                $this->displayMenu();
                break;
            case 4:
                $this->roster->displayPE();
                readline("Press \"Enter\" key to continue...");
                $this->displayMenu();
                break;
            default:
                echo "Invalid Input!\n";
                readline("Press \"Enter\" key to continue...");
                $this->displayMenu();
                break;
        }
    }

    public function countMenu() {
        $this->clear();
        echo "[1] Count All Employee\n";
        echo "[2] Count Commission Employee\n";
        echo "[3] Count Hourly Employee\n";
        echo "[4] Count Piece Worker\n";
        echo "[0] Return\n";
        $choice = readline("Select Menu: ");

        switch ($choice) {
            case 0:
                $this->otherMenu();
                break;

            case 1:
                echo "Total number of employees: " . $this->roster->count() . "\n";
                readline("Press \"Enter\" key to continue...");
                $this->countMenu();
                break;
            case 2:
                echo "Total number of commission employees: " . $this->roster->countCE() . "\n";
                readline("Press \"Enter\" key to continue...");
                $this->countMenu();
                break;
            case 3:
                echo "Total number of hourly employees: " . $this->roster->countHE() . "\n";
                readline("Press \"Enter\" key to continue...");
                $this->countMenu();
                break;
            case 4:
                echo "Total number of piece workers: " . $this->roster->countPE() . "\n";
                readline("Press \"Enter\" key to continue...");
                $this->countMenu();
                break;

            default:
                echo "Invalid Input!\n";
                readline("Press \"Enter\" key to continue...");
                $this->countMenu();
                break;
        }
    }

    public function clear() {
        system('clear');
    }

    public function repeat() {
        echo "Employee Added!\n";
        if ($this->roster->count() < $this->size) {
            $c = readline("Add more ? (y to continue): ");
            if (strtolower($c) == 'y')
                $this->addMenu();
            else
                $this->entrance();

        } else {
            echo "Roster is Full\n";
            readline("Press \"Enter\" key to continue...");
            $this->entrance();
        }
    }
}