<?php


class Permutation
{
    private $str;
    private $length;
    private $countCombination;

    /**
     * @return mixed
     */
    public function getCountCombination()
    {
        return $this->countCombination;
    }

    public function __construct($str, $length)
    {
        if (strlen($str) <= 1) {
            throw new ValidateValueException("Вводимая строка должа быть длинной больше нуля и больше 1");
        } else
            $this->str = str_split($str);
        if ($length <= 0) {
            throw  new ValidateValueException("Выводимая длинна сторки должна быть больше нуля");
        } else
            $this->length = $length;
        $this->countCombination = 0;
    }

    private function permute($l, $step = 0, $ch = array(), &$result = array())
    {
        if ($l == 1) {
            for ($k = 0; $k < count($this->str); $k++) {
                if (in_array($k, $ch))
                    continue;
                $tmp = '';
                foreach ($ch as $l) {
                    $tmp .= $this->str[$l];
                }
                $result[] = $tmp . $this->str[$k];
                $this->countCombination++;
            }
        } else {
            for ($i = 0; $i < count($this->str); $i++) {
                if (in_array($i, $ch))
                    continue;
                $ch[$step] = $i;

                $this->permute($l - 1, $step + 1, $ch, $result);
            }
        }
        return $result;
    }

    public function countingOfPlacements()
    {
        return $this->factorial(count($this->str)) / ($this->factorial(count($this->str) - $this->length));
    }

    private function factorial($value)
    {
        if ($value == 1 || $value == 0)
            return 1;
        return ($value - 1) * $value;
    }

    public function printOnDisplay()
    {
        foreach ($this->permute($this->length) as $s) {
            echo $s . "<br>";
        }
    }


}