//datepicker plugin
//link
$('.date-picker').datepicker({
autoclose: true,
			todayHighlight: true
})
//show datepicker when clicking on the icon
.next().on(ace.click_event, function(){
			$(this).prev().focus();
});
//or change it into a date range picker
$('.input-daterange').datepicker({autoclose:true});



		 $('.chosen-select').chosen({allow_single_deselect:true});
				//resize the chosen on window resize

				$(window)
						.off('resize.chosen')
						.on('resize.chosen', function() {
							$('.chosen-select').each(function() {
								var $this = $(this);
								$this.next().css({'width': $this.parent().width()});
							})
						}).trigger('resize.chosen');