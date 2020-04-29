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
 * Theme Boost Campus - JS code back to top button
 *
 * @package    theme_urcourses_default
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery'], function($) {
    "use strict";

    /**
     * Initialising.
     */
    function initLightBoxes() {
		$('a[rel="lightbox"]').each(function() {
			//console.log($( this ).attr( "title" )+'init');
			$(this).attr('data-toggle','modal');
			$(this).attr('data-target','#lightboxmodal');
			$(this).click(function() {
				$('#lbimg').attr('src',$(this).children('img').eq(0).attr('src'));
				$('#lbimgcap').html($(this).attr('title'));
				//console.log($( this ).attr( "title" )+' clicked');
				//console.log('obj:'+$(this).children('img').eq(0));
				//console.log('src:'+$(this).children('img').eq(0).attr('src'));
			});
		});
    }

    return {
        init: function() {
			// do we have links to lightbox?
			if ($('a[rel="lightbox"]').length > 0) {
				// does a modal already exist?
				if (!$('#lightboxmodal').length > 0) { 
			    	// it does not exist,create it
				
					var modalmarkup = '<!-- Modal -->';
					modalmarkup += '<div class="modal fade" id="lightboxmodal" role="dialog">';
					modalmarkup += '<div class="modal-dialog">';
					modalmarkup += '  <!-- Modal content-->';
					modalmarkup += '    <div class="modal-content">';
					modalmarkup += '      <div class="modal-header">';
					modalmarkup += '        <button type="button" class="close" data-dismiss="modal">&times;</button>';
					modalmarkup += '        <!--<h4 class="modal-title">Modal Header</h4>-->';
					modalmarkup += '      </div>';
					modalmarkup += '      <div class="modal-body">';
					modalmarkup += '        <figure class="figure"><img id="lbimg" class="" src="" />';
					modalmarkup += '        <figcaption id="lbimgcap" class="figure-caption"></figcaption>';
					modalmarkup += '      </div>';
					modalmarkup += '      <div class="modal-footer">';
					modalmarkup += '        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
					modalmarkup += '      </div>';
					modalmarkup += '    </div>';
					modalmarkup += ' </div>';
					modalmarkup += '</div>';
				
				    $("body").append(modalmarkup);
				
				}
				
            	initLightBoxes();
			
			}
        }
    };
});
