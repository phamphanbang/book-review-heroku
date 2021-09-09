<?php
function imgSrc($image = null)
{
    return $image ? 'upload/user/'.$image : 'upload/user/default.jpg';
}
