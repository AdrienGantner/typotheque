<?php

function makeFontID($font)
{
    return $font->title()->slug();
}

function makeFontCSSName($fontURL)
{
    return Str::slug(basename($fontURL->url()));
}
