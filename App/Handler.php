<?php
namespace App;

class Handler
{
    public function handleMove(bool $isPrev, bool $isLeft, bool $isRight):string
    {
        $moves = [
            1  => $isPrev,
            2  => $isLeft,
            3  => $isRight
        ];

        $keyNumber = 0;
        while (!$moves[$keyNumber]) {
            fscanf(STDIN, "%d\n", $keyNumber);
        }

        return $this->getSideName($keyNumber);
    }

    private function getSideName($keyNumber):string
    {
        $side = '';
        switch ($keyNumber) {
            case 1:
                $side = 'prev';
                break;
            case 2:
                $side = 'left';
                break;
            case 3:
                $side = 'right';
                break;
        }

        return $side;
    }
}