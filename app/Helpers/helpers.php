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
}
