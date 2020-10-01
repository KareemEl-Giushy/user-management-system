<?php

    class msg {
        function alert($type, $msg) {
            return"
                <div class='alert alert-$type alert-dismissable'>
                    <button class='close' data-dismiss='alert'>&times;</button>
                    <strong class='text-center'>$msg</strong>
                </div>
            
            ";

        }
    }