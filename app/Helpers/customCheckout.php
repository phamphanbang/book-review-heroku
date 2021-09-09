<?php

use App\Enums\CartStatus;

function customCheckout($data)
{
    
    if (!$data ) {
        return '<a href="' . url('checkout') .'"><b>'. __('message.Checkout') .'</b></a>';
    }
    elseif ($data->status == CartStatus::PENDING) {
        return '<a href="'.url('cancel/'.$data->id).'"><b>'.__('message.CancelRequest') .'</b></a>';
    }
    elseif ($data->status == CartStatus::CANCEL) {
        return '<p class="fail"><b>'.__('message.RequestIsCancel').'</b></p>';
    }
    elseif ($data->status == CartStatus::DONE) {
        return '<p class="success"><b>'.__('message.RequestIsDone').'</b></p>';
    }
    elseif ($data->status == CartStatus::SHOPPING) {
        return '<a href="' . url('latestCart') .'"><b>'. __('message.Checkout') .'</b></a>';
    }
}