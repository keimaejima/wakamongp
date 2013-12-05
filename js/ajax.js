<script>
$('#sendButton').click(function(){
	var formVal = $('#wakaname').val();
	$.post('./post.php',{'name':formVal},function(data){
			console.log(data);
		});
});
</script>