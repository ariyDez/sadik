<?php

namespace App;

use SleepingOwl\Admin\AssetManager\AssetManager;
use SleepingOwl\Admin\FormItems\Text;
use SleepingOwl\Admin\Interfaces\FormItemInterface;

class ColorItem extends Text implements FormItemInterface
{
    protected $label;
    public function render()
    {
        AssetManager::addScript('admin::default/js/jscolor.min.js');
        $content = '<label for="color">'.$this->label.'</label>';
        $content .= "<input type='text' class='jscolor form-control' name='value' id='color'>";
        return $content;
    }

    public function label($label = null)
    {
        $this->label = $label;
        return $this;
    }
    
}
