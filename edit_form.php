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
class block_custom_menu_edit_form extends block_edit_form {
    protected function specific_definition($mform) {
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $mform->addElement('textarea', 'config_menu_items', get_string('menu_items', 'block_custom_menu'));
        $mform->setType('config_menu_items', PARAM_RAW);

        $mform->addElement('text', 'config_menu_bg_color', get_string('menu_bg_color', 'block_custom_menu'));
        $mform->setDefault('config_menu_bg_color', '#ffffff');
        $mform->setType('config_menu_bg_color', PARAM_TEXT);

        $mform->addElement('text', 'config_menu_text_color', get_string('menu_text_color', 'block_custom_menu'));
        $mform->setDefault('config_menu_text_color', '#000000');
        $mform->setType('config_menu_text_color', PARAM_TEXT);

        $mform->addElement('text', 'config_menu_hover_bg_color', get_string('menu_hover_bg_color', 'block_custom_menu'));
        $mform->setDefault('config_menu_hover_bg_color', '#f0f0f0');
        $mform->setType('config_menu_hover_bg_color', PARAM_TEXT);

        $mform->addElement('text', 'config_menu_hover_text_color', get_string('menu_hover_text_color', 'block_custom_menu'));
        $mform->setDefault('config_menu_hover_text_color', '#000000');
        $mform->setType('config_menu_hover_text_color', PARAM_TEXT);

        $mform->addElement('text', 'config_burger_icon_color', get_string('burger_icon_color', 'block_custom_menu'));
        $mform->setDefault('config_burger_icon_color', '#000000');
        $mform->setType('config_burger_icon_color', PARAM_TEXT);
    }
}