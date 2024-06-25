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
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtextarea(
        'block_custom_menu/menu_items',
        get_string('menu_items', 'block_custom_menu'),
        get_string('menu_items_desc', 'block_custom_menu'),
        ''
    ));

    $settings->add(new admin_setting_configcolourpicker(
        'block_custom_menu/menu_bg_color',
        get_string('menu_bg_color', 'block_custom_menu'),
        get_string('menu_bg_color_desc', 'block_custom_menu'),
        '#ffffff'
    ));

    $settings->add(new admin_setting_configcolourpicker(
        'block_custom_menu/menu_text_color',
        get_string('menu_text_color', 'block_custom_menu'),
        get_string('menu_text_color_desc', 'block_custom_menu'),
        '#000000'
    ));

    $settings->add(new admin_setting_configcolourpicker(
        'block_custom_menu/menu_hover_bg_color',
        get_string('menu_hover_bg_color', 'block_custom_menu'),
        get_string('menu_hover_bg_color_desc', 'block_custom_menu'),
        '#f0f0f0'
    ));

    $settings->add(new admin_setting_configcolourpicker(
        'block_custom_menu/menu_hover_text_color',
        get_string('menu_hover_text_color', 'block_custom_menu'),
        get_string('menu_hover_text_color_desc', 'block_custom_menu'),
        '#000000'
    ));
}