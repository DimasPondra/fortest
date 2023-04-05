<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task2()
    {
        $values = [1,3,2,9,5];

        $result = [];

        foreach ($values as $value) {
            if (empty($result)) {
                $result[] += $value;
            } else {
                $index = count($result) - 1;

                if ($result[$index] <= $value) {
                    $result[] += $value;
                } else {

                    foreach ($result as $key => $rs) {
                        if ($rs > $value) {
                            $result[$key] = $value;
                            $result[] += $rs;
                        }
                    }
                }
            }
        }

        dd($result);
    }

    public function task3()
    {
        $values = [1,3,2,9,5];

        $bigger = null;
        foreach ($values as $value) {
            if (empty($bigger)) {
                $bigger = $value;
            } else {
                if ($bigger < $value) {
                    $bigger = $value;
                }
            }
        }

        $values2 = [3, 7, -3, 5, 9, 5];

        $smaller = null;
        foreach ($values2 as $value) {
            if (empty($smaller)) {
                $smaller = $value;
            } else {
                if ($smaller > $value) {
                    $smaller = $value;
                }
            }
        }

        return view('tasks.task-3', [
            'bigger' => $bigger,
            'smaller' => $smaller
        ]);
    }
}
