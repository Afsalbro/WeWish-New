
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
	<script src="{{ asset('assets/js/browser.min.js') }}"></script>
	<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
	<script src="{{ asset('assets/js/util.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>

	<script>
		$(document).ready(function(){
			setTimeout(function(){
				$('.alert').fadeOut( 3000 );
			}, 2000);
		})

		$('.message-area').hide();
		
		$('.tx-msg').show();

		$('.light-button').on('click',function(){
			$('.light-button').removeClass('active');
			$('.message-area').hide();
			
			$('.' + $(this).attr('attr')).show();
			$(this).addClass('active');
			$('.active-type').val($(this).val());
		});
	</script>