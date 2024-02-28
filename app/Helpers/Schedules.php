<?php
namespace App\Helpers;
use Carbon\Carbon;

class Schedules {

    private static $daysRelation = [
        'lunes' => 1,
        'martes' => 2,
        'miercoles' => 3,
        'jueves' => 4,
        'viernes' => 5,
        'sabado' => 6,
        'domingo' => 7,
    ];

    public static function getDayRelation($day) {
        return self::$daysRelation[strtolower($day)];
    }

    public static function updateDay(&$days, $id, $day, $hour, $per, $status) {
        foreach ($days[$day] as &$hours) {
            if ($hours['hora'] === $hour) {
                $hours['id'] = $id;
                $hours['per'] = $per;
                $hours['status'] = $status;
                break;
            }
        }

        return $days;
    }

    public static $days = [
        'Lunes' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],
        'Martes' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],
        'Miercoles' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],

        'Jueves' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],
        'Viernes' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],
        'Sabado' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],
        'Domingo' => [
            ['id' => null, 'hora' => '7:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '8:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '9:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '10:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '11:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '12:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '13:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '14:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '15:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '16:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '17:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '18:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '19:00', 'per' => '0', 'status' => null],
            ['id' => null, 'hora' => '20:00', 'per' => '0', 'status' => null],
        ],
    ];
}