<?php
class StackTest
{
    public function ParseRules(){
        // Load the language file containing error messages
        $this->CI->lang->load('form_validation');
        
        // <editor-fold desc="Pre-determined set of rules abbreviation" defaultstate="collapsed">
        $trans_rules_list = [
            "A" => "alpha",
            "a" => "alpha_numeric",
            "B" => "",
            "b" => "",
            "C" => "",
            "c" => "",
            "D" => "valid_date",
            "d" => "",
            "E" => "valid_email",
            "e" => "",
            "F" => "",
            "f" => "",
            "G" => "greater_than",
            "g" => "greater_than_equal_to",
            "H" => "",
            "h" => "",
            "I" => "in_list",
            "i" => "integer",
            "J" => "valid_jp_name",
            "j" => "",
            "K" => "max_length",
            "k" => "min_length",
            "L" => "less_than",
            "l" => "less_than_equal_to",
            "M" => "not_match",
            "m" => "",
            "N" => "numeric",
            "n" => "is_natural",
            "O" => "is_natural_no_zero",
            "o" => "",
            "P" => "valid_phone_3",
            "p" => "check_phone_no_international",
            "Q" => "",
            "q" => "",
            "R" => "required",
            "r" => "",
            "S" => "",
            "s" => "",
            "T" => "",
            "t" => "",
            "U" => "is_unique",
            "u" => "",
            "V" => "valid_video_size",
            "v" => "valid_video_type",
            "X" => "",
            "x" => "",
            "Y" => "",
            "y" => "",
            "Z" => "valid_zipcode",
            "z" => ""
        ];
        // </editor-fold>

        $rules = [];
        $rule_index = 0;
        foreach ($form_data as $field_name => $value) {
            $field_item = explode('__', $field_name);
            if (isset($field_item[1])) {

                $key_string   = preg_replace("/[0-9]+/", "", $field_item[1]);
                $rules_keys   = str_split($key_string, 1);
                $rules_keys   = array_unique($rules_keys);
                $value_string = preg_replace("/[^0-9]/", "_", $field_item[1]);
                $rules_value  = explode('_', $value_string);

                $rules[$rule_index]['rules'] = "";
                $rules[$rule_index]['field'] = $field_name;
                $rules[$rule_index]['label'] =  isset($error_message_array[$field_name]['label']) ? $error_message_array[$field_name]['label'] : null ;

                foreach ($rules_keys as $keyy => $rules_key) {
                    $rule_name = isset($trans_rules_list[$rules_key]) ? $trans_rules_list[$rules_key] : null;
                    if (isset($rule_name) && $rule_name !== "") {
                        $str_rules = !empty($rules_value[$keyy+1]) ? $rule_name."[".$rules_value[$keyy+1]."]" : $rule_name;
                        $rules[$rule_index]['rules'] .=  $str_rules.'|' ;
                        $rules[$rule_index]['errors'][$rule_name]    = $this->CI->lang->line('form_validation_'.$rule_name);
                        if(isset($error_message_array)){
                            if(isset($error_message_array[$field_name]) && isset($error_message_array[$field_name][$rule_name])){
                                $rules[$rule_index]['errors'][$rule_name]    = $error_message_array[$field_name]['error'][$rule_name];
                            }
                        }
                    }
                }

                $rules[$rule_index]['rules'] =  rtrim($rules[$rule_index]['rules'], '|') ;
                $rule_index += 1;
            }
        }

        return $rules;
    }
}
