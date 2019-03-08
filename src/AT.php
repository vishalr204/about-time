<?php
/**
 * Created by PhpStorm.
 * User: Vishal-Ribdiya
 * Date: 2/27/2019
 * Time: 1:46 AM
 */

namespace CrossBones\AboutTime;

use Carbon\Carbon;

/**
 * Class AT
 * @package CrossBones\AboutTime
 */
class AT
{
    /** @var int $dateTime */
    private $dateTime;
    
    /**
     * AT constructor.
     * @param string|null $dateTime
     */
    public function __construct($dateTime = null)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @param string $dateTime
     * @return AT
     */
    public function make($dateTime)
    {
        return (new AT($dateTime));
    }

    /**
     * @param \DateTime|string $startDate
     * @param \DateTime|string $endDate
     * @param string $format e.g D, l
     *
     * @throws \Exception
     *
     * @return array
     */
    public static function days($startDate, $endDate, $format = 'l')
    {
        $days = [];

        $startDate = new \DateTime($startDate);
        $endDate = new \DateTime($endDate);

        /** @var \DateTime $i */
        for ($i = $startDate; $i <= $endDate; $i->modify('+1 days')) {
            $days[] = $startDate->format($format);
        }

        return array_unique($days);
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @return int
     */
    public function length($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        return $endDate->diffInDays($startDate);
    }
}
