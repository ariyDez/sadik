<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 20.03.2016
 * Time: 19:53
 */?>

<?php if(! isset($value)) $value = null ?>
<div class="{!! $errors->has($name) ? 'has-error' : null !!}">
    <label for="{!! $name !!}">{{ $title }}</label>
    {!! Form::text($name, $value, array('placeholder' =>  $placeholder, 'class' => $class, 'id' => $id)) !!}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>