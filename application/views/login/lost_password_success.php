<?php
/**
 * Created by Scott Robarts, Blink Web Design and Development.
 * User: srobarts
 * Date: 16/12/10
 * Time: 10:58 PM
 * All rights reserved.
 */
?>

<script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );

		$( "#dialog-message" ).dialog({
			modal: true,
			buttons: {
				Ok: function() {
					$( this ).dialog( "close" );
                    location.href = 'login';
				}
			}
		});
	});
</script>


<div id="dialog-message" style="display:none">
    <p>A new password has been sent to your e-mail address.</p>
</div>

<h3>Lost Password Success</h3>