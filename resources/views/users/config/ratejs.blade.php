<script>
	var ratedIndex = -1;
	$(document).ready(function(){
		resetStartColor();
		$('.ion-ios-star').on('click',function(){
			ratedIndex = parseInt($(this).data('index'));
		});

		$('.ion-ios-star').mouseover(function() {
			resetStartColor();
			var currentIndex = parseInt($(this).data('index'));

			for(var i=0; i<=currentIndex; i++){
				$('.ion-ios-star:eq('+i+')').css('color','yellow');
			}
		});

		$('.ion-ios-star').mouseleave(function() {
			resetStartColor();
			if(ratedIndex != 1)
				for(var i=0; i<=ratedIndex; i++)
					$('.ion-ios-star:eq('+i+')').css('color','yellow');
		});
	});

	function resetStartColor(){
		$('.ion-ios-star').css('color','#333')
	}
</script>