var url = 'http://obocomer.com';
window.addEventListener("load", function(){
	//cuando cargamos la pagina
	
	$('.btn-like').css('cursor', 'pointer');
	$('.btn-dislike').css('cursor', 'pointer');
	
	// Botón de like
	function like(){
		$('.btn-like').unbind('click').click(function(){ //cada vez que le deamos click desaparece lo antiguo
			
			$(this).addClass('btn-dislike').removeClass('btn-like');
			$(this).attr('src', url+'/imagenes/down.jpg');
			/*el valor del data id se lo pasamo home.blade*/ 
			$.ajax({
				url: url+'/like/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado like a la publicacion');
					}else{
						console.log('Error al dar like');
					}
				}
			});
			
			dislike();
		});
	}
	like();
	
	// Botón de dislike
	function dislike(){
		$('.btn-dislike').unbind('click').click(function(){
			console.log('dislike');
			$(this).addClass('btn-like').removeClass('btn-dislike');
			$(this).attr('src', url+'/imagenes/up.jpg');
			
			$.ajax({
				url: url+'/dislike/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					if(response.like){
						console.log('Has dado dislike a la publicacion');
					}else{
						console.log('Error al dar dislike');
					}
				}
			});
			
			like();
		});
	}
	dislike();
	
	// BUSCADOR
	$('#buscador').submit(function(e){
		$(this).attr('action',url+'/people/'+$('#buscador #buscar').val());

	});
	
});