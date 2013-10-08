<?php

class Controller{

    public function load_view($view, $fail_safe = FALSE) {

        $file_name = getcwd() . '/view/' . $view . '.php';

        if (file_exists($file_name)) {

            include $file_name;
            return;
        } else {
            $file_name = str_replace('.php', '.html', $file_name);
            if (file_exists($file_name)) {

                include $file_name;
                return;
            } else {
                if ($fail_safe) {
                    return;
                } else {
                    echo 'View File not found. View : ' . $view;  //Exception handling
                }
            }
        }
    }

    public function load_model($model, $fail_safe = FALSE) {

        $file_name = getcwd() . '/Model/' . $model . '.php';

        if (file_exists($file_name)) {

            include $file_name;
            return;
        } else {
            if ($fail_safe) {
                return;
            } else {
                echo 'Model File not found. Model : ' . $model;  //Exception handling
            }
        }
    }

}

?>