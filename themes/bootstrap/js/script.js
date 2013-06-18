$(document).ready(function(){
	$(document).on('click', '.resolveProblem', function(){
		var id = $(this).data('id');
		
		$.ajax({
			url: "/site/getmodal_inner_adm?id="+id,
			success: function(d){
				$('#resolveProblem .modal-body').html(d);
				$('#resolveProblem').modal('toggle');
			},
			error: function(){
				alert('Error :-(');
			},
		});
	})
	
	
	$(document).on('click', '#Submit', function(){
		var id = $('#resolveProblem .modal-body input[name="Wodo[id]"]').val();
		var date = $('#resolveProblem .modal-body input[name="Wodo[date]"]').val();
		var solution = $('#resolveProblem .modal-body input[name="Wodo[solution]"]').val();
		
		$.ajax({
			type: 'POST',
			data: {'Wodo[date]':date, 'Wodo[solution]':solution},
			url: "/site/update?id="+id,
			success: function(){
				location.href=location.href;
			},
			error: function(){
				alert('Error :-(');
			},
		});
		
		return false;
	})
	
})