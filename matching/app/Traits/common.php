<?php

namespace App\Traits;

trait Common
{
    public function getAges()
    {
        for ($i = 18; $i <= 80; $i++) {
            $ages[] = [
                'age' => $i
            ];
        }

        return $ages;
    }

}