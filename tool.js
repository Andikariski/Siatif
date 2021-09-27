jQuery(function()
{		
	// function untuk mengambil semua data
	function getAll()
	{
		$.ajax({
			url: 'tool_cek.php',
			type: 'GET',
			data: 'action=show-all',
			cache: false,
			success: function(response){
				// jika berhasil 
				$("#tooltip").html(response);
			}
		});			
	}
	
	getAll(); // load ketika document ready

	// ketika ada event change
	$("#pembimbing").change(function()
	{				
		var id = $(this).find(":selected").val();
		var dataString = 'action='+ id;
				
		$.ajax({
			url: 'tool_cek.php',
			type: 'POST',
			data: dataString,
			cache: false,
			success: function(response){
				// jika berhasil 
				$("#tooltip").html(response);
			} 
		});
	})
});