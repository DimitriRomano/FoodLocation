(function($){

	$.fn.notif = function(options){
		var options = $.extend({
			html :'<div class="notification animated fadeInRight">\
			<div class="right">\
				<h2>{{title}}</h2>\
				<p class="notif">{{content}}</p>\
			</div>\
		</div>', 
		timeout:false
		}, options);

		return this.each(function(){
			var $this = $(this);
			var $notifs = $('> .notifications', this);
			var $notif = $(Mustache.render(options.html,options));
			if($notifs.length == 0){
				$notifs = $('<div class="notifications"/>');
				$this.prepend($notifs);
			}
			$notifs.append($notif);
			if(options.timeout !=0){
				setTimeout(function(){
					$notif.trigger('click');
				},options.timeout)
			}
			$notif.click(function(event){
				event.preventDefault();
				$notif.addClass('fadeOutLeft').delay(500).fadeOut(300 , function(){
					if($notif.siblings().length==0){
						$notif.remove();
					}
					$notif.remove();
				});
			})
		})
	}
	
		$('body').notif({title:'WELCOME', content: 'Adam',timeout:2000});

})(jQuery);