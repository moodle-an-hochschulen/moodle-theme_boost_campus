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
 * Theme Boost Campus - Language pack (DE)
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>,
 *             2017 Sennewald, Bergische Universität Wuppertal (ZIM)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Boost Campus';
$string['choosereadme'] = 'Das Theme „Boost Campus“ ist ein Child-Theme zur Nutzung an Universitäten.';

/* Settings */
$string['configtitle'] = 'Boost Campus Einstellungen';
$string['layoutsettings'] = 'Layout Einstellungen';
$string['designsettings'] = 'Design Einstellungen';

$string['loginbackgroundimagesetting'] = 'Hintergrundbild des Logins';
$string['loginbackgroundimagesetting_desc'] = 'Hochgeladene Bilder werden in zufälliger Reihenfolge auf der Loginseite als Hintergrundbild verwendet.';
$string['loginform'] = 'Login-Formular';
$string['loginform_desc'] = 'Durch Aktivierung dieser Einstellung werden die Login-Felder optimiert um eine größere Anzahl Hintergrundbilder zu unterstützen. Die Login-Felder werden verkleinert und links positioniert. Links, weil viele Bilder in der Mitte ihren Inhalt beinhalten. Hinweis: Diese Funktion kann auch ohne ein Hintergrundbild genutzt werden.';

$string['footerblocks0columnssetting'] = 'Blöcke im Footer: 0';
$string['footerblocks1columnssetting'] = 'Blöcke im Footer: 1';
$string['footerblocks2columnssetting'] = 'Blöcke im Footer: 2';
$string['footerblocks3columnssetting'] = 'Blöcke im Footer: 3';
$string['footerblockssetting'] = 'Footerblöcke';
$string['footerblockssetting_desc'] = 'Mögliche Anzahl von Blöcken in Spalten im Footer. Die Spalten werden nur auf großen Bildschirmen angezeigt. Auf kleinen Bildschirmen wird automatisch auf eine Spalte umgestellt.';

$string['faviconsetting'] = 'Favicon';
$string['faviconsetting_desc'] = 'Hier kann ein Bild (.ico .png) hochgeladen werden, das vom Browser als Favicon verwendet wird.';

$string['region-footer-left'] = 'Footer (links)';
$string['region-footer-middle'] = 'Footer (mitte)';
$string['region-footer-right'] = 'Footer (rechts)';
$string['region-side-pre'] = 'Rechts';

$string['courseeditbuttonsetting'] = 'Zusätzlicher „Bearbeiten einschalten“-Button';
$string['courseeditbuttonsetting_desc'] = 'Ein weiterer „Bearbeiten einschalten“-Button wird oben im Kurs angezeigt.';

$string['section0titlesetting'] = 'Sektion 0: Titel';
$string['section0titlesetting_desc'] = 'Diese Einstellung beeinflusst die Darstellung des Titels der ersten Kurssektion. Moodle zeigt diese nicht an, solange der Standardtitel gesetzt ist. Soblad ein Nutzer den Titel ändert, erscheint er. Durch Aktivierung dieser Einstellung wird immer der Titel der ersten Sektion angezeigt.';

$string['showswitchedroleincoursesetting'] = 'Position der Rollenwechsel-Information';
$string['showswitchedroleincoursesetting_desc'] = 'Mit dieser Einstellung wählst du den Anzeigeort der Rollenwechsel-Information, sofern ein Nutzer die entsprechende Funktion nutzt. Bei Deaktivierung (Standard) steht die Information unterhalb des Nutzernamens im Nutzermenü. Bei Aktivierung steht die Information - zusammen mit einem Link zum Rollenwechsel - unter dem Kurs, da diese Funktion kursbezogen ist.';
$string['switchedroleto'] = 'Du betrachtest diesen Kurs mit der Rolle:';

$string['fontfilessetting'] = 'Font-Dateien';
$string['fontfilessetting_desc'] = 'Hier können eigene Fonts (.eot .woff .woff2 .ttf .svg) hochgeladen werden.<br/>Wichtig: Damit ein solcher Font genutzt werden kann, muss entsprechender Coder im Bereich „Raw SCSS“ unter „Erweiterte Einstellungen“ ergänzt werden. In der README.md gibt es ein Beispiel dazu.';

$string['loginpagedesignheadingsetting'] = 'Loginseite';
$string['fontdesignheadingsetting'] = 'Fonts';

$string['footerlinksheadingsetting'] = 'Standard-Footerlinks';
$string['footerlinksheadingsetting_desc'] = 'Moodle platziert einige Standard-Links im Footer: einen zur Moodle-Dokumentation, einen mit Login-Informationen und einen zur Startseite.<br/>Mit der folgenden Einstellung kann die Auswahl eingeschränkt werden.';
$string['footerlinks_desc'] = 'Den Link im Footer ausblenden.';

$string['footerhidehelplinksetting'] = 'Verberge den Link zur Moodle-Dokumentation';
$string['footerhidelogininfosetting'] = 'Verberge Login-Information';
$string['footerhidehomelinksetting'] = 'Verberge den Link zur Startseite';

$string['courselayoutheadingsetting'] = 'Kurslayout';
$string['footerlayoutheadingsetting'] = 'Footerlayout';

$string['blockdesignheadingsetting'] = 'Blöcke';
$string['blockiconsetting'] = 'Blockicon';

$string['blockiconsetting_desc'] = 'Durch diese Einstellung kann ein standardmäßiges „Font Awesome“-Icon vor einen Blocktitel platziert werden. Bei Aktivierung wird eine individuelle Icon-Ersetzung für viele Moodle-Blöcke ermöglicht. Alternativ kann dies via SCSS für den Block individuell erledigt werden. Eine Übersicht des Unicode gibt es auf http://fontawesome.io/icons/.<br/>Der Code zum Austausch des Blocks „Personen“ sieht bspw. folgendermaßen aus:';
$string['blockiconsetting_desc_code'] = '.block_people .card-block .card-title::before { content: \'\f0c0\' ; }';

$string['presetheadingsetting'] = 'Voreinstellungen';
$string['brandcolorheadingsetting'] = 'Themefarben';
$string['faviconheadingsetting'] = 'Favicon';
$string['brandsuccesscolorsetting'] = 'Meldungsfarbe: Erfolg';
$string['brandsuccesscolorsetting_desc'] = 'Beispiel: Positive Prüfung von Formularfeldern.';
$string['brandinfocolorsetting'] = 'Meldungsfarbe: Information';
$string['brandinfocolorsetting_desc'] = 'Beispiel: Verfügbarkeit von Kursaktivitäten.';
$string['brandwarningcolorsetting'] = 'Meldungsfarbe: Warnung';
$string['brandwarningcolorsetting_desc'] = 'Diese Farbe wird für Warnhinweise genutzt.';
$string['branddangercolorsetting'] = 'Meldungsfarbe: Problem';
$string['branddangercolorsetting_desc'] = 'Beispiel: Negative Prüfung von Formularfeldern.';

$string['navbardesignheadingsetting'] = 'Navigationsleiste';
$string['darknavbarsetting'] = 'Dunkle Navigationsleiste';
$string['darknavbarsetting_desc'] = 'Bei Aktivierung wird die helle Navigationsleiste durch eine dunkle ersetzt.';
