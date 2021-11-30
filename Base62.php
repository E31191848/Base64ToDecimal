<?php
final class Base62
{
    public $char = [];

    function __construct()
    {
        $this->setCharVal();
    }

    public function decodeBase62($string = null)
    {
        if ($string != null) {
            // clean special character
            $string = $this->cleanSpecialChar($string);

            // check if contain operand character for count the value 
            if (preg_match('/[-\+\/\*]/', $string)) {
                $listStrOpr = preg_split('@([\+\-/\*])@', $string, -1, PREG_SPLIT_DELIM_CAPTURE); // split by operand character
                for ($i = 0; $i < sizeof($listStrOpr); $i++) {
                    if (preg_match('/[^-\+\/\*]/', $listStrOpr[$i])) {
                        // split string every character
                        $temp = str_split($listStrOpr[$i]);
                        $decimal = 0;
                        $j = 0;
                        foreach (array_reverse($temp) as $temp) {
                            $decimal += $this->char[$temp] * pow(62, $j++);
                        }

                        $listStrOpr[$i] = $decimal;
                    }
                }

                $strTemp = '';
                foreach ($listStrOpr as $str) {
                    $strTemp .= $str;
                }

                return $this->calculateString($strTemp);
            } else {
                // split string every character
                $temp = str_split($string);
                $decimal = 0;
                $i = 0;
                foreach (array_reverse($temp) as $temp) {
                    $decimal += $this->char[$temp] * pow(62, $i++);
                }

                return str_replace(',', '', number_format($decimal));
            }
        }
    }

    public function encodeBase62($int = null)
    {
        if ($int != null) {
            // clean special character
            $int = $this->cleanSpecialChar($int);

            // clean alphabet
            $int = preg_replace('/[^0-9\-\+\/\*]/', '', $int);

            if ($int == 0) {
                return 0;
            } else {
                // check if contain operand character for count the value
                if (preg_match('/[-\+\/\*]/', $int)) {
                    $int = $this->calculateString($int);
                    if ($int == 'invalid') return 'invalid';
                }

                $temp = [];
                $base62 = '';
                while ($int >= 1) {
                    $temp[] = $int % 62;
                    $int = $int / 62;
                }

                foreach (array_reverse($temp) as $temp) {
                    $base62 .= array_search($temp, $this->char);
                }

                return $base62;
            }
        }
    }

    private function setCharVal()
    {
        $i = 0;
        // 0-9
        for ($i; $i <= 9; $i++) {
            $this->char[$i] = $i;
        }
        // A-Z
        foreach (range('A', 'Z') as $var) {
            $this->char[$var] = $i++;
        }
        // a-z
        foreach (range('a', 'z') as $var) {
            $this->char[$var] = $i++;
        }
    }

    private function cleanSpecialChar($str)
    {
        // clean special character
        $str = preg_replace('/[^A-Za-z0-9\-\+\/\*]/', '', $str);

        if (preg_match('/[A-Za-z0-9]/', $str)) {
            // clean one first character in '+ * /' if not started by string
            $check = true;
            while ($check) {
                if (preg_match('/[+\/\*]/', $str[0])) {
                    $str = ltrim($str, $str[0]);
                } else {
                    $check = false;
                }
            }

            // clean one last character in '+ - * /' if not followed by string
            $check = true;
            while ($check) {
                if (preg_match('/[-\+\/\*]/', $str[-1])) {
                    $str = rtrim($str, $str[-1]);
                } else {
                    $check = false;
                }
            }

            return $str;
        } else {
            return 0;
        }
    }

    private function calculateString($str = null)
    {
        $math_string = "return " . $str . ";";
        try {
            $result = eval($math_string);
        } catch (ParseError $e) {
            return 'invalid';
        }
        return $result;
    }
}
