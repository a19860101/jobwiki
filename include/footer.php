<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
	$(function(){
		$(".x").on("click",function(){
			$("#z-nav").toggleClass("h-nav-open");
		})
		$(".hamburger").on("click",function(){
			$("#z-nav").toggleClass("h-nav-open");
			console.log("htmlburger");
		})
		    $(".list1").on("click",function(){
        $(this).siblings(".list2").slideToggle();
    })
	})
</script>
</body>
</html>