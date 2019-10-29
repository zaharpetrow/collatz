<?php

class Collatz
{

    private function collatz(int $start): array
    {
        $resultArray = [
            'long'     => 1,
            'integers' => "$start",
        ];

        while ($start > 1) {
            if ($start % 2 === 0) {
                $start /= 2;
            } else {
                $start = (3 * $start) + 1;
            }

            $resultArray['integers'] .= " > $start";
            $resultArray['long'] ++;
        }

        return $resultArray;
    }

    private function longest_collatz(int $maxInt): array
    {
        $resultArray = [
            'longestCollatz' => 0,
            'integers'       => '',
        ];

        for ($i = 1; $i < $maxInt; $i++) {
            $collatz = $this->collatz($i);

            if ($collatz['long'] > $resultArray['longestCollatz']) {
                $resultArray = [
                    'longestCollatz' => $collatz['long'],
                    'integers'       => $collatz['integers'],
                ];
            }
        }

        return $resultArray;
    }

    public function init($maxInt)
    {
        return $this->longest_collatz($maxInt);
    }

}

echo '<pre>';
print_r((new Collatz())->init(1000000));
