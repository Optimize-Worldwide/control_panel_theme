
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
(function($){
	$(document).ready(function(){
		$(".cmb-repeatable-group .postbox:not(.closed)").addClass('closed');
		$(".meta-box-sortables .postbox:not(.closed)").addClass('closed');
		$("#submitdiv").removeClass('closed');
		$("#meta_site_basic, #meta_site_social, #meta_site_hosting, #meta_site_domain, #meta_site_ftp, #meta_site_cms, #meta_site_services, #meta_site_styles, #meta_reference_basic, #meta_reference_theme, #meta_reference_user_guide, #meta_reference_slideshow, #meta_reference_snippet, #meta_reference_link").appendTo('#advanced-sortables');
		$("#postimagediv, #servicediv, #commentsdiv").appendTo("#side-sortables");


		if(window.location.hash) {
			var hash = window.location.hash.substring(1);
			$("#"+hash).removeClass('closed');
		}

		$('#post').attr('novalidate','novalidate');//Yikes

		var url = window.location.pathname,
				filename = url.substring(url.lastIndexOf('/')+1),
				boss_id = 5,
				office_manager_id = 9,
				current_user = $('#post_author_override option[selected]').val();

		if(filename == 'post-new.php' && getParameterByName('post_type') == 'credential') {
			$('#_credential_allowed_users').val(boss_id+','+office_manager_id+','+current_user);
		}
	})
})(jQuery);