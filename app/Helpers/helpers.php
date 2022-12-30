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
}
