<?php

namespace Core\HTML;

class Form
{
    private $data;
    public $surround = 'p';

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    protected function surround($html)
    {
        return '<'. $this->surround .'>'. $html .'</'. $this->surround .'>';
    }

    public function file($name, $label, $options = [])
    {
        $class = '';
        if (isset($options['class'])) {
            if (is_array($options['class'])) {
                $class = ' class="'. implode(' ', $options['class']). '"';
            } else {
                $class = ' class="'. $options['class']. '"';
            }
        }
        return  '<input type="file" name="'. $name .'"' . $class .'>';
    }

    protected function getValue($index, $key = null)
    {
        if (strpos($index, '[]') !== false) {
            $index = str_replace('[]', '', $index);
        }
        if (is_object($this->data)) {
            if ($key !== null and is_array($this->data->$index)) {
                return $$this->data->$index[$key];
            } elseif (isset($this->data->$index)) {
                return $this->data->$index;
            }
            return null;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<input type="'. $type .'" name="'. $name .'" value="'. $name .'" value="'. $this->getValue($name) .'">'
        );
    }

    public function password($name)
    {
        return $this->surround(
            '<input type="password" name="'. $name .'" value="'. $name .'" value="'. $this->getValue($name) .'">'
        );
    }

    public function submit($text)
    {
        return $this->surround(
            '<button type="submit" name="submit">'. $text .'</button>'
        );
    }
}
