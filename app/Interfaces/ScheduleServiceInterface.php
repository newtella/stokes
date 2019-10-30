<?php namespace App\Interfaces;

use Carbon\carbon;

interface ScheduleServiceInterface
{
    public function isAvailableInterval($date, $doctorId, Carbon $start);
    public function getAvailableIntervals($date, $doctorId);
}