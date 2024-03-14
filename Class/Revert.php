<?php
namespace Class;
class Revert
{
    private $string;

    /**
     * @return mixed
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @param mixed $string
     */
    public function setString($string)
    {
        $this->string = $string;
    }

    /**
     * @param $string
     */
    public function __construct($string = null)
    {
        $this->string = $string;
    }

    public function revString(string $string)
    {
        $string = trim($string, ' ');
        $arr = explode(' ', $string); // Разбиваем строку на массив

        foreach ($arr as $key => $word) { //перебираем каждое слово

            /* Проверяем регистр букв и данные заносим в массив $arrRegisterChar*/
            $arrRegisterChar = [];
            foreach (str_split($word) as $char) {
                $arrRegisterChar[] = ctype_upper($char) ? 1 : 0;
            }

            $arrStructureWord = explode(' ', preg_replace('/\W+/', ' ', $word));//заменяем символы на пробелы и заносим в массив

            if (count($arrStructureWord) > 1) {// если длина массива больше 1, значит есть символы
                $arrSymbol = preg_split("/[0-9a-zA-Z\d]/", $word, -1, PREG_SPLIT_NO_EMPTY); //получаем массив символов
                $counterSymbol = 0; //счетчик символов
                $counterWord = 0; //счетчик слов
                $regularWord = '';
                foreach ($arrStructureWord as $value) {
                    if (empty($value)) { //если $value пуст, значит там символ
                        $regularWord .= $arrSymbol[$counterSymbol];
                        $counterSymbol++;
                        $counterWord = 0;
                    } elseif (!empty($value) && $counterWord == 0) { //если $value есть и идет не подряд, то выводим строку
                        $regularWord .= strrev($value);
                        $counterWord++;
                    } elseif (!empty($value) && $counterWord > 0) { // если $value есть, но счетчик указывает, что слова идут подряд, значит между ними символ
                        $regularWord .= $arrSymbol[$counterSymbol];
                        $counterSymbol++;
                        $regularWord .= strrev($value);
                        $counterWord++;
                    }
                }
            } else {
                $regularWord = strrev($word); //переворачиваем строку
            }


            /* Согласно массиву $arrRegisterChar устранавливаем нужный регистр букв */
            $x = 0;
            foreach ($arrRegisterChar as $registerChar) {
                $regularWord[$x] = ($registerChar == 1) ? strtoupper($regularWord[$x]) : strtolower($regularWord[$x]);
                $x++;
            }
            $arrWord[] = $regularWord;
        }
        return $string = implode(' ', $arrWord);
    }
}




