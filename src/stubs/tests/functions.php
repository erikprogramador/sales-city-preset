<?php

function create($model, $overrides = [], $quantity = null)
{
    return factory($model, $quantity)->create($overrides);
}

function make($model, $overrides = [], $quantity = null)
{
    return factory($model, $quantity)->make($overrides);
}

function createStates($model, $state, $overrides = [], $quantity = null)
{
    return factory($model, $quantity)->states($state)->create($overrides);
}

function makeStates($model, $state, $overrides = [], $quantity = null)
{
    return factory($model, $quantity)->states($state)->make($overrides);
}
