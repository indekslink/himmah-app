<?php
function avatar($urlImage, $path = '/images/user/')
{
    return asset($path . $urlImage);
}
function gambarPaketUmroh($urlImage)
{
    return asset('/images/paket-umroh/' . $urlImage);
}
function formatIDR($value)
{

    return number_format($value, 0, '.', '.');
}
function emailLogin()
{
    return auth()->user()->email;
}
function idTokoUser()
{
    return auth()->user()->store->id;
}
