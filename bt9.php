<?php
//2
echo "bai2<br>";
class Point2D {
    private $x;
    private $y;
    
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    
    public function calculateDistance($point) {
        $xDistance = $this->x - $point->x;
        $yDistance = $this->y - $point->y;
        return sqrt(pow($xDistance, 2) + pow($yDistance, 2));
    }
}

$point1 = new Point2D(3, 4);
$point2 = new Point2D(6, 8);
$distance = $point1->calculateDistance($point2);
echo "Distance between two points: " . $distance . "<br>";

//3
echo "<br>bai3<br>";
class IntegerArray {
    private $array;

    public function __construct($array) {
        $this->array = $array;
    }

    public function calculateSum() {
        return array_sum($this->array);
    }

    public function calculateAverage() {
        $numberOfElements = count($this->array);
        if ($numberOfElements > 0) {
            $sum = $this->calculateSum();
            return $sum / $numberOfElements;
        } else {
            return 0;
        }
    }

    public function findMax() {
        return max($this->array);
    }
}

$arrayObject = new IntegerArray([1, 2, 3, 9, 6]);
$sum = $arrayObject->calculateSum();
$average = $arrayObject->calculateAverage();
$max = $arrayObject->findMax();
echo "Sum of elements in the array: " . $sum . "<br>";
echo "Average of elements in the array: " . $average . "<br>";
echo "Maximum element in the array: " . $max . "<br>";

//4
echo "<br>bai4<br>";
class Clock {
    private $hour;
    private $minute;
    private $second;
    
    public function __construct($hour, $minute, $second) {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }
    
    public function displayTime() {
        $formattedHour = str_pad($this->hour, 2, '0', STR_PAD_LEFT);
        $formattedMinute = str_pad($this->minute, 2, '0', STR_PAD_LEFT);
        $formattedSecond = str_pad($this->second, 2, '0', STR_PAD_LEFT);
        
        return $formattedHour . ':' . $formattedMinute . ':' . $formattedSecond;
    }
    
    public function increaseSecond() {
        $this->second++;
        
        if ($this->second >= 60) {
            $this->second = 0;
            $this->increaseMinute();
        }
    }
    
    private function increaseMinute() {
        $this->minute++;
        
        if ($this->minute >= 60) {
            $this->minute = 0;
            $this->increaseHour();
        }
    }
    
    private function increaseHour() {
        $this->hour++;
        
        if ($this->hour >= 24) {
            $this->hour = 0;
        }
    }
}

$clock = new Clock(23, 59, 59);
echo "Current time: " . $clock->displayTime() . "<br>";

$clock->increaseSecond();
echo "Time after increasing one second: " . $clock->displayTime() . "<br>";

//5
echo "<br>bai5<br>";
class Student {
    private $studentId;
    private $fullName;
    
    public function __construct($studentId, $fullName) {
        $this->studentId = $studentId;
        $this->fullName = $fullName;
    }
    
    public function getStudentId() {
        return $this->studentId;
    }
    
    public function getFullName() {
        return $this->fullName;
    }
}

class StudentList {
    private $list;
    
    public function __construct() {
        $this->list = array();
    }
    
    public function addStudent(Student $student) {
        $this->list[] = $student;
    }
    
    public function displayList() {
        foreach ($this->list as $student) {
            echo "Student ID: " . $student->getStudentId() . ", Full Name: " . $student->getFullName() . "<br>";
        }
    }
}

$studentList = new StudentList();

$student1 = new Student("SV001", "Johny Quan");
$student2 = new Student("SV002", "Michale Quan");
$student3 = new Student("SV003", "Johnson Quan");

$studentList->addStudent($student1);
$studentList->addStudent($student2);
$studentList->addStudent($student3);

$studentList->displayList();

//6
echo "<br>bai6<br>";
class Car {
    private $carBrand;
    private $color;
    private $yearOfManufacture;
    
    public function __construct($carBrand, $color, $yearOfManufacture) {
        $this->carBrand = $carBrand;
        $this->color = $color;
        $this->yearOfManufacture = $yearOfManufacture;
    }
    
    public function displayInformation() {
        echo "Car brand: " . $this->carBrand . "<br>";
        echo "Color: " . $this->color . "<br>";
        echo "Year of manufacture: " . $this->yearOfManufacture . "<br>";
    }
}

$car = new Car("Vinfast", "Black", 2023);
$car->displayInformation();

//7
echo "<br>bai7<br>";
class Fraction {
    private $numerator;
    private $denominator;
    
    public function __construct($numerator, $denominator) {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }
    
    public function addFraction(Fraction $fraction) {
        $newNumerator = ($this->numerator * $fraction->denominator) + ($fraction->numerator * $this->denominator);
        $newDenominator = $this->denominator * $fraction->denominator;
        return new Fraction($newNumerator, $newDenominator);
    }
    
    public function subtractFraction(Fraction $fraction) {
        $newNumerator = ($this->numerator * $fraction->denominator) - ($fraction->numerator * $this->denominator);
        $newDenominator = $this->denominator * $fraction->denominator;
        return new Fraction($newNumerator, $newDenominator);
    }
    
    public function multiplyFraction(Fraction $fraction) {
        $newNumerator = $this->numerator * $fraction->numerator;
        $newDenominator = $this->denominator * $fraction->denominator;
        return new Fraction($newNumerator, $newDenominator);
    }
    
    public function divideFraction(Fraction $fraction) {
        $newNumerator = $this->numerator * $fraction->denominator;
        $newDenominator = $this->denominator * $fraction->numerator;
        return new Fraction($newNumerator, $newDenominator);
    }
    
    public function displayFraction() {
        echo $this->numerator . "/" . $this->denominator;
    }
}

$fraction1 = new Fraction(1, 2);
$fraction2 = new Fraction(3, 4);

$sum = $fraction1->addFraction($fraction2);
$diff = $fraction1->subtractFraction($fraction2);
$product = $fraction1->multiplyFraction($fraction2);
$quotient = $fraction1->divideFraction($fraction2);

echo "Sum: ";
$sum->displayFraction();
echo "<br>";

echo "Difference: ";
$diff->displayFraction();
echo "<br>";

echo "Product: ";
$product->displayFraction();
echo "<br>";

echo "Quotient: ";
$quotient->displayFraction();
echo "<br>";

//8 
echo "<br>bai8<br>";
class Person {
    private $name;
    private $age;
    private $address;
    
    public function __construct($name, $age, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }
    
    public function displayInformation() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Address: " . $this->address . "<br>";
    }
}

$person = new Person("Yasuo AKA Ke Bat Dung Thu", 20, "Ironia");
$person->displayInformation();

//9
echo "<br>bai9<br>";
class Product {
    private $name;
    private $price;
    private $description;
    
    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }
    
    public function displayInformation() {
        echo "Name: " . $this->name . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Description: " . $this->description . "<br>";
    }
}

$product = new Product("Coat", 2000000, "Men's black coat");
$product->displayInformation();

//10
echo "<br>bai10<br>";
class RoomBooking {
    private $name;
    private $checkInDate;
    private $numOfNights;
    public function __construct($name, $checkInDate, $numOfNights) {
        $this->name = $name;
        $this->checkInDate = $checkInDate;
        $this->numOfNights = $numOfNights;
    }
    
    public function calculateTotalAmount($roomPrice) {
        $totalAmount = $roomPrice * $this->numOfNights;
        return $totalAmount;
    }
    
    public function displayInformation() {
        echo "Name: " . $this->name . "<br>";
        echo "Check-in Date: " . $this->checkInDate . "<br>";
        echo "Number of Nights: " . $this->numOfNights . "<br>";
    }
}

$roomBooking = new RoomBooking("Jett", "2023-07-5", 3);
$roomBooking->displayInformation();

$roomPrice = 1000000; // Room price is 1,000,000 VND per night
$totalAmount = $roomBooking->calculateTotalAmount($roomPrice);
echo "Total amount to be paid: " . $totalAmount . " VND<br>";    