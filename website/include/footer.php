
	<!-- Footer -->
	<footer id="footer_1" class="bg_blue">
       
        <div class="footer_botom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-6 col-sm-12">
                        <p>Copyrights © 2021 Developed By @Binit.</p>
                    </div>
                    <div class="col-md-6 col-md-6 col-sm-12 text-right">
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<!-- Footer -->

	

	<script type="text/javascript">

			$('#refresh').on('click', function(){

			$.ajax({

			method: "POST",

			url: "http://localhost:5000/api/createvideo",

			data: {},

			}).done(function( data ) {
			
					console.log(data);

			});

			setTimeout(function(){// wait for 5 secs
					location.reload(); // then reload the page
				}, 5000); 

			});
	</script>

	<script src="js/jquery.2.2.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>