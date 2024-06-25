<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version information. When a new version is released the version is incremented
 *
 * @package    block_custom_menu
 * @copyright  2024 Lewis Carr adaptiVLE Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_custom_menu extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_custom_menu');
    }

    public function instance_allow_multiple() {
        return true;
    }

    public function has_config() {
        return false;
    }

    public function instance_allow_config() {
        return true;
    }

    public function hide_header() {
        return !$this->page->user_is_editing();
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        global $PAGE;
        $PAGE->requires->css('/blocks/custom_menu/styles.css');
        $PAGE->requires->js('/blocks/custom_menu/menu.js');

        $this->content = new stdClass;
        $this->content->text = $this->generate_menu();
        $this->content->footer = '';

        return $this->content;
    }

    private function generate_menu() {
        if (empty($this->config)) {
            return 'Please configure the menu items.';
        }

        $menuItems = explode("\n", $this->config->menu_items ?? '');
        
        $bgColor = $this->config->menu_bg_color ?? '#ffffff';
        $textColor = $this->config->menu_text_color ?? '#000000';
        $hoverBgColor = $this->config->menu_hover_bg_color ?? '#f0f0f0';
        $hoverTextColor = $this->config->menu_hover_text_color ?? '#000000';
        $burgerColor = $this->config->burger_icon_color ?? '#000000';
        
        $output = '<style>
            .block_custom_menu .card-body {
                padding: 0 !important;
                background-color: ' . $bgColor . ' !important;
            }
            .block_custom_menu {
                border: none !important;
                border-radius: 0 !important;
            }
            .block_custom_menu .card {
                border: none !important;
                border-radius: 0 !important;
            }
            .custom-menu {
                --menu-bg-color: ' . $bgColor . ';
                --menu-text-color: ' . $textColor . ';
                --menu-hover-bg-color: ' . $hoverBgColor . ';
                --menu-hover-text-color: ' . $hoverTextColor . ';
                --burger-icon-color: ' . $burgerColor . ';
            }
        </style>';
        $output .= '<nav class="custom-menu">';
        $output .= '<div class="custom-menu-toggle">&#9776;</div>';
        $output .= '<ul class="custom-menu-list">';
        
        $this->generate_menu_items($menuItems, $output);
        
        $output .= '</ul>';
        $output .= '</nav>';
        
        return $output;
    }

    private function generate_menu_items($items, &$output, $level = 0) {
        $current_level = 0;
        foreach ($items as $key => $item) {
            $item = trim($item);
            if (empty($item)) {
                continue;
            }
            
            $indent = substr_count($item, '-');
            $item = ltrim($item, '-');
            $parts = explode('|', $item);
            $title = $parts[0];
            $url = isset($parts[1]) ? $parts[1] : '#';
            
            if ($indent > $current_level) {
                $output .= '<ul class="submenu level-' . $indent . '">';
                $current_level = $indent;
            } elseif ($indent < $current_level) {
                $output .= str_repeat('</ul></li>', $current_level - $indent);
                $current_level = $indent;
            }
            
            $output .= '<li class="menu-item level-' . $indent . '">';
            $output .= '<a href="' . $url . '">' . $title . '</a>';
            
            if (!isset($items[$key + 1]) || substr_count($items[$key + 1], '-') <= $indent) {
                $output .= '</li>';
            }
        }
        $output .= str_repeat('</ul></li>', $current_level);
    }

    public function instance_config_save($data, $nolongerused = false) {
        $config = clone($data);
        parent::instance_config_save($config, $nolongerused);
    }
}