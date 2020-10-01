<?php

    class msg {
        function alert($type, $msg, $icon = "") {
            return"
                <div class='alert alert-$type alert-dismissable'>
                    <i class='$icon'></i>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong class='text-center'>$msg</strong>
                </div>
            
            ";

        }
    }