		</div>
		<?php wp_footer(); ?>
	</body>
	<script>
		// Masonry starts to initialize before document is ready
		var container = document.querySelector('.single-site .entry-content');
		var viewport = updateViewportDimensions();
		if (viewport.width >= 768) {
			var msnry = new Masonry( container, {itemSelector: '.card',isInitLayout: false,gutter: 16});
		}
		var allPanels = jQuery('.accordion main').hide();
	</script>
	<script async>
		document.addEventListener("touchstart", function(){}, true);
		jQuery(document).ready(function(){
				// Remove loader after loaded
				setTimeout(function(){
					jQuery("#loader").css('opacity','0');
					jQuery("#loader").addClass('loaded');
				},100);

				// Layout Masonry while loading
				setTimeout(function(){
					if (viewport.width >= 768) {
						msnry.layout();
					}
				},100);

				var titles = document.querySelectorAll('.archive .filter-list h2');
				// fitterHappierText(titles,{paddingY: 2});
		});
	</script>
	<script defer>
		window.onresize = function() {
			if (viewport.width >= 768) {
				if(!msnry) {
					var msnry = new Masonry( container, {itemSelector: '.card',isInitLayout: false,gutter: 16});
				}
				msnry.layout();
			}
		};
		(function($) {
			$('#fullscreen').click(function(event){
				if ($('article.slideshow').hasClass('fullscreen')) {
					$('article.slideshow').removeClass('fullscreen');
					$('#fullscreen').html("Fullscreen");
				} else {
					$('article.slideshow').addClass('fullscreen');
					$('#fullscreen').html("X");
					$('slidesjs-container').css("width","100%");
					$('slidesjs-control').css("width","100%");
				};
			});

			// TODO: Improve AJAX to live update when user interacts
			jQuery(document).ready(function(){

				$('.filter').focus();

				$('#header-search .screen-reader-text').click(function(){ $('#s').toggleClass('open'); });

				$("body").on("copy", "button.clipboard", function(e) {
					e.clipboardData.clearData();
					e.clipboardData.setData("text/plain", $(this).next("pre").text());
					e.preventDefault();
				});


				$('.checklist-item input[type=submit]').click(function(e){
					e.preventDefault();
					var save_button = $(this);
					var checklist_item = $(this).closest('.checklist-item');
					var checklist_item_name = checklist_item.attr('id');
					var split = $(this).closest('.checklist').attr('id').split('-'); //Splits the ID at the dash. checklists pulled in on other post types have id set to 'checklist-{id}'
					var notes = $(this).siblings('textarea').val();

					if (split[0] == 'checklist') {//First portion of split will be type, 'post', or 'checklist'
						var checklist_id = split[1];
					} else {
						var checklist_id = <?php echo $post->ID; ?>;//if ID is not 'checklist', we're on the checklist page and want to output post id
					};

					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: "action=noteitem&id="+checklist_id+"&item="+checklist_item_name+"&notes="+escape(notes),
						complete: function(msg){
							console.log(msg);
							save_button.closest('form').append('<span class="ajax-success"></span>');
						}
					});
				});


				$('.checklist-item input[type=checkbox]').click(function(e){
					e.preventDefault();

					var checklist_item = $(this).closest('.checklist-item');
					var checklist_item_name = checklist_item.attr('id');
					var is_checked = $(this).attr('checked');
					var split = $(this).closest('.checklist').attr('id').split('-'); //Splits the ID at the dash. checklists pulled in on other post types have id set to 'checklist-{id}'

					if (split[0] == 'checklist') {//First portion of split will be type, 'post', or 'checklist'
						var checklist_id = split[1];
					} else {
						var checklist_id = <?php echo $post->ID; ?>;//if ID is not 'checklist', we're on the checklist page and want to output post id
					};

					var progress_bar = $(this).closest('.checklist').find('progress');
					var progress_bar_value = progress_bar.attr('value');
					var checkbox = $(this);

					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: "action=checkitem&id="+checklist_id+"&item="+checklist_item_name,
						error: function(msg){
							alert('error'+msg);
							console.log(msg);
						},
						complete: function(msg){
							if (checklist_item.hasClass('incomplete')) {
								checklist_item.removeClass('incomplete');
								checklist_item.addClass('completed');
								checkbox.prop('checked', true);
								progress_bar_value = progress_bar_value + 1;
								progress_bar.attr('value', progress_bar_value);
							} else {
								checklist_item.removeClass('completed');
								checklist_item.addClass('incomplete');
								checklist_item.removeClass('accordion');
								checklist_item.children('main').remove()
								checkbox.prop('checked', false);
								progress_bar_value = progress_bar_value - 1;
								progress_bar.attr('value', progress_bar_value);
							}
						}
					});
				});



				$('.new-checklist').click(function(e){
					e.preventDefault();

					var checklist_type = $(this).data('type').toLowerCase();

					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: "action=create_checklist&id=<?php echo $post->ID; ?>&type="+checklist_type,
						complete: function(msg){
							console.log(msg);
							window.open("http://cp.optimizehere.co/index.php?p="+msg.responseText);
							$(this).remove();
							// TODO: Check which checklists exists again, add mini-checklist & remove "new X checklist" link
						}
					})
				});


				$('.accordion header').click(function() {
					if ($(this).next().is(":visible")) {
						$(this).next().slideUp();
						$(this).removeClass("open");
						$(this).parent(".accordion").removeClass("open");
					} else {
						$(this).addClass("open");
						$(this).next().slideDown();
						$(this).parent(".accordion").addClass("open");
					}
					setTimeout(function(){
						msnry.layout();
					},500);
					return false;
				});

				$('.filter').fastLiveFilter('.filter-list', {
					timeout: 200,
					callback: function() {
						if ($('.filter').val()) {
							$('.filter-list .card').addClass('centered');
						} else {
							$('.filter-list .card').removeClass('centered');
						}
					}
				});

				$('.filter').keypress(function (e){
					var key = e.which;
					if(key == 13) {
						link = $('.filter-list .card:visible').first().find('header a').attr("href");
						window.open(link,"_self");
					}
				});


				$('.username, .password, .email, .number, .fee-field:not([data-type="rich"])').click(function(){
					var doc = document, text = this, range, selection;
					if (doc.body.createTextRange) {
						range = document.body.createTextRange();
						range.moveToElementText(text);
						range.select();
					} else if (window.getSelection) {
						selection = window.getSelection();
						range = document.createRange();
						range.selectNodeContents(text);
						selection.removeAllRanges();
						selection.addRange(range);
					}
				});

				$('#tasks').on('click','.task button', function (){
					var task = $(this).parents('.task').find('h3').text();
					var parent_element = $(this).parents('.task');
					$.ajax({
						type: "POST",
						url: ajaxurl,
						data: "action=billable_stamp&user=<?php echo get_current_user_id(); ?>&id=<?php echo $post->ID; ?>&task="+task,
						complete: function(msg){
							console.log(msg.responseText);
							var response = $.parseJSON(msg.responseText);
							if(response.type === "started") {//If is initial stamp
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] .start').remove();
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] h4').append("<small>&nbsp;started working at "+response.html+"</small>");
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] ul.stamps').prepend('<button class="stop">Stop Working</button>');
								// parent_element.find('main').append(msg.responseText);
							} else if(response.type === "completed"){//if is stopping stamp
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] h4 small').remove();
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] ul.stamps .stop').remove();
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] ul.stamps').prepend('<button class="start">Start Working</button>');
								parent_element.find('.users li[data-user="<?php echo get_current_user_id(); ?>"] ul.stamps').append(response.html);
							} else if(response.type === "initial") {
								parent_element.find('main .start').remove();
								parent_element.find('main').append(response.html);
							}
							// Remove clicked button if initial button, then append whatever response text is returned
						}
					})
				});

				$('#tasks .create-task').click(function (){
					var name = prompt('Enter task name','default task name');
					if(name) {
						$.ajax({
							type: "POST",
							url: ajaxurl,
							data: "action=billable_create&id=<?php echo $post->ID; ?>&task="+name,
							complete: function(msg){
								console.log(msg.responseText);
								$('#tasks>ul').append(msg.responseText);
								msnry.layout();
							}
						});
					}
				});

				$(".sticky").sticky({topSpacing:0});

				$(window).bind('beforeunload', function(){
					$("#loader").css('opacity','1');
					$("#loader").removeClass('loaded');
				});
			});
		})(jQuery);
	</script>

</html> <!-- end of site. what a ride! -->
