<?php

function localRoute($path) {
    return '/' . app()->getLocale() . $path;
}