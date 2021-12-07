<?php

namespace App\Traits;

use App\Helpers\Helper;
use App\Models\Setting;
use Carbon\Carbon;
use DateTimeInterface;

trait UnixTimestampSerializable
{
    public static function getFormattedDateObject($date, $type = 'datetime', $array = true)
    {
        if ($date == '') {
            return null;
        }

        $settings = Setting::getSettings();
        $temp_date = new Carbon($date);

        if ($settings->count() > 0) {

            if ($type == 'datetime') {

                $datetime['datetime'] = $temp_date->format('Y-m-d H:i:s');
                $datetime['formatted'] = $temp_date->format($settings->date_format . ' ' . $settings->time_format);

            } elseif ($type == 'time') {

                $datetime['datetime'] = $temp_date->format('H:i:s');
                $datetime['formatted'] = $temp_date->format($settings->time_format);

            }else {

                $datetime['datetime'] = $temp_date->format('Y-m-d');
                $datetime['formatted'] = $temp_date->format($settings->date_format);

            }

        } else {

            if ($type == 'datetime') {

                $datetime['formatted'] = $temp_date->format('Y-m-d H:i:s');

            } elseif ($type == 'time') {

                $datetime['formatted'] = $temp_date->format('H:i:s');

            }else {

                $datetime['formatted'] = $temp_date->format('Y-m-d');

            }

        }

        if ($array == 'true') {
            return $datetime;
        }

        return $datetime['formatted'];
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $this->getFormattedDateObject($date, 'datetime', false);
    }
}
