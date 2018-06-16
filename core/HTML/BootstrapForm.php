<?php

namespace Core\HTML;

class BootstrapForm extends Form
{

    protected function surround($html)
    {
        return '<div class="form-group">'. $html .'</div>';
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $class = 'form-control';
        if (isset($options['class'])) {
            if (is_array($options['class'])) {
                $class = $class . ' ' . implode(' ', $options['class']);
            } else {
                $class = $class . ' ' . $options['class'];
            }
        }
        $help_block = isset($options['help_block']) ?
            '<span class="help-block">'. $options['help_block'] .'</span>' : null;
        $label = '<label>'. $label .'</label>';
        $value = $this->getValue($name);
        if ($type === 'textarea') {
            $input = '<textarea name="'. $name .'" class="form-control">'. $value .'</textarea>';
        } else {
            $input = '<input type="'. $type .'" name="'. $name .'" value="'. $value .'" class="'. $class .'">';
        }
        return ($type != 'file') ? $this->surround($label . $input . $help_block) : $label . $input;
    }

    public function hidden($name, $options = [])
    {
        return '<input type="hidden" name="'. $name .'" value="'. $this->getValue($name) . '" class="form-control">';
    }

    public function select($name, $label, $options)
    {
        $label = '<label>'. $name .'</label>';
        $input = '<select class="form-control" name="'. $name .'">';
        foreach ($options as $k => $v) {
            $selected = ($k == $this->getValue($name)) ? ' selected' : '';
            $input .= '<option value="'. $k .'"'. $selected .'>'. $v .'</option>';
        }
        $input.= '</select>';
        return $this->surround($label . $input);
    }

    public function submit($text, $options = [])
    {
        $class = '';
        if (isset($options['class'])) {
            if (is_array($options['class'])) {
                $class = ' class="'. implode(' ', $options['class']) .'"';
            } else {
                $class = ' class="'. $options['class'] . '"';
            }
        }
        return $this->surround(
            '<button type="submit" name="submit"'. $class . '>'. $text .'</button>'
        );
    }
}
