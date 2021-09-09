<?php
function customTime($data)
{
    $time = date('M d/Y ', strtotime($data)) . __('at') . date(' H:i A ', strtotime($data));
    return $time;
}
