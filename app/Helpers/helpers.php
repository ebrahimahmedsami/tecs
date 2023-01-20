<?php



if (!function_exists('genders')){
     function gender(){
        return [
          1 => __('dashboard.male'),
          0 => __('dashboard.female')
        ];
    }
}

if (!function_exists('reservation_types')){
    function reservation_types(){
        return [
            0 => __('dashboard.reserve_type_select'),
            1 => __('dashboard.discovery_type_select')
        ];
    }

    if (!function_exists('reservation_status')) {
        function reservation_status()
        {
            return [
                0 => __('dashboard.pending'),
                1 => __('dashboard.finished'),
                2 => __('dashboard.canceled'),
            ];
        }
    }

    if (!function_exists('get_patient_data_table')) {
        function get_patient_data_table($patient)
        {
            return '<table class="table text-center">'.
              '<thead class="table-dark">'.
                '<tr>'.
                  '<th scope="col">'.__('dashboard.name_ar').'</th>'.
                  '<th scope="col">'.__('dashboard.name_en').'</th>'.
                  '<th scope="col">'.__('dashboard.table phone').'</th>'.
                  '<th scope="col">'.__('dashboard.national_id').'</th>'.
                  '<th scope="col">'.__('dashboard.age').'</th>'.
                  '<th scope="col">'.__('dashboard.gender').'</th>'.
                  '<th scope="col">'.__('dashboard.table address').'</th>'.
                '</tr>'.
              '</thead>'.
              '<tbody>'.
                '<tr>'.
                  '<th>'.$patient->name_ar.'</th>'.
                  '<th>'.$patient->name_en.'</th>'.
                  '<td>'.$patient->phone.'</td>'.
                  '<td>'.$patient->national_id.'</td>'.
                  '<td>'.$patient->age.'</td>'.
                  '<td>'.$patient->gender_text.'</td>'.
                  '<td>'.$patient->address.'</td>'.
                '</tr>'.
              '</tbody>'.
            '</table>';
        }
    }

    if (!function_exists('clinic_holidays')) {
        function clinic_holidays()
        {
            return [
                '6' => __('dashboard.saturday'),
                '0' => __('dashboard.sunday'),
                '1' => __('dashboard.monday'),
                '2' => __('dashboard.tuesday'),
                '3' => __('dashboard.wednesday'),
                '4' => __('dashboard.thursday'),
                '5' => __('dashboard.friday'),
            ];
        }
    }


    if (!function_exists('ArabicDate')) {

        function ArabicDate($date_param = null)
        {
            $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
            $your_date = $date_param ? \Carbon\Carbon::parse($date_param)->format('y-m-d') : date('y-m-d'); // The Current Date
            $en_month = date("M", strtotime($your_date));
            foreach ($months as $en => $ar) {
                if ($en == $en_month) {
                    $ar_month = $ar;
                }
            }

            $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
            $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
            $ar_day_format = date("D", strtotime($your_date)); // The Current Day
            $ar_day = str_replace($find, $replace, $ar_day_format);

            header('Content-Type: text/html; charset=utf-8');
            $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
            $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
            $current_date = $ar_day . ' ' . (date("d", strtotime($your_date))) . ' / ' . $ar_month . ' / ' . (date("y", strtotime($your_date)));
            return str_replace($standard, $eastern_arabic_symbols, $current_date);
        }
    }
    if (!function_exists('getDayInArabic')) {

            function getDayInArabic($day)
            {
                $weekdays = \Carbon\Carbon::getDays();
                return \Carbon\Carbon::create($weekdays[$day])->locale(app()->getLocale())->dayName;
            }
        }
}
