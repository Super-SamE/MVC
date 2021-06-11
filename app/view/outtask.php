<?php

    foreach ($out as $outtask) {
        if($outtask['status']==0) {
            echo "
                <div class='tasks'>
                    <div class='row'>
                        <div class='col-lg-8 col-md-8'>
                            <div>
                                <label>$outtask[description]</label>
                            </div>
                            <div class='btn-form2'>
                                <a href='?class=Maincontroller&option=tasklist&ready=$outtask[id]'><button type='submit' name='ready' class='btn btn-outline-dark'><b>READY</b></button></a>
                                <a href='?class=Maincontroller&option=tasklist&delidtask=$outtask[id]'><button type='submit' name='deleteidtask' class='btn btn-outline-dark'><b>DELETE</b></button></a>
                            </div>
                        </div>
                        <div class='col-lg-4 col-md-4'>
                            <div class='circle'>

                            </div>
                        </div>
                    </div>
                </div>
            ";
        } else {
            echo "
                <div class='tasks1'>
                    <div class='row'>
                        <div class='col-lg-8 col-md-8'>
                            <div>
                                <label>$outtask[description]</label>
                            </div>                                                        
                            <div class='btn-form2'>
                                <a href='?class=Maincontroller&option=tasklist&remove=$outtask[id]'><button type='submit' name='remove' class='btn btn-outline-dark'><b>UNREADY</b></button></a>
                                <a href='?class=Maincontroller&option=tasklist&delidtask=$outtask[id]'><button type='submit' name='deleteidtask' class='btn btn-outline-dark'><b>DELETE</b></button></a>
                            </div>                                                        
                        </div>
                        <div class='col-lg-4 col-md-4'>
                            <div class='circle1'>

                            </div>
                        </div>
                    </div>
                </div>
            ";
        }
    }

?>