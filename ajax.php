<script src="jq.js"></script>
<script>

$(document).ready(function(e) {	
	$("#departure").keyup(function()
	{
		$("#here").show();
		var x = $(this).val();
		$.ajax(
		{
			type:'GET',
			url:'reserve.php',
			data:'q='+x,
			success:function(data)
			{
				$("#here").html(data);
			}
			,
		});
		
    });
});

</script>

<style>

#input
{
	width::400px;
	font-size:24px;
}

#here
{
	width:400px;
	height:300px;
	border:1px solid grey;
	display:none;
}

#here a
{
	display:block;
	width:98%;
	padding:1%;
	font-size:20px;
	border-bottom:1px solid grey;
}

</style>

<div id="here">

</div>