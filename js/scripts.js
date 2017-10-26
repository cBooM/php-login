$(document).ready(function() {
    $('.button').click(function(event) {
        $.post('includes/displayData.php', function(data) {
            $(".html").append(data).hide().slideDown(500);
        });

        /*	
        $.ajax({
        	url: 'includes/displayData.php',
        	type: 'POST',
        	success:function(data){
        		$(".html").append(data).hide().slideDown(500);				
        	}
        });*/
    });
});