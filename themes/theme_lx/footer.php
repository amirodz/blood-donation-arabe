<button onclick="topFunction()" id="scroll" title="Go to top">Top<span></span></button>


<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
            
                <p class="text-right h5"><i class="fa fa-heart"></i><a href="<?php echo base_url(); ?>"> <?php echo $site_address; ?>مار- بالقل </a> الهاتف : <span><?php echo $site_phone; ?></span></p>
				
				<p class="text-center h5 mt-3"> <a href="https://www.facebook.com/%D8%AC%D9%85%D8%B9%D9%8A%D8%A9-%D8%A3%D8%B5%D8%AF%D9%82%D8%A7%D8%A1-%D8%A7%D9%84%D9%85%D8%B1%D9%8A%D8%B6-%D8%A7%D9%84%D9%82%D9%84-100440788179709/" class="table-link text-info">
				<span class="fa-stack">
				<i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span></a>
				<iframe src="https://ghbtns.com/github-btn.html?user=amirodz&repo=blood-donation-arabe&type=star&count=true&size=large" frameborder="0" scrolling="0" width="170" height="30" title="GitHub"></iframe>
  
           <!-- <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a> --></p>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- Fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancybox/jquery.fancybox.css'); ?>">

<script>

		var mymap = L.map('my_osm_widget_map', { /* use the same name as your <div id=""> */
    			center: [37.00409, 6.55655], /* set the center of the displayed map as GPS Coordinates : [LAT,LON] */
    			zoom: 13, /* define the zoom level */
    			zoomControl: true, /* false = no zoom control buttons displayed */
			scrollWheelZoom: true /* false = scrolling zoom on the map is locked */
		});

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { 
			maxZoom: 20, 
			attribution: 'Données &copy; Contributeurs <ahref="http://openstreetmap.org">OpenStreetMap</a> ' + ' | ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a> ' +
				'Guillaume Rouan 2016', 
			id: 'mapbox.streets' 
		}).addTo(mymap);

		L.marker([37.00409, 6.55655]).addTo(mymap); 
		var popup = L.popup();

 	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("إحداثيات هذا المكان : " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);
	</script>
<!-- Fancybox JS library -->
<script src="<?php echo base_url('assets/fancybox/jquery.fancybox.js'); ?>"></script>

<!-- Initialize fancybox -->
<script>
    $("[data-fancybox]").fancybox();
</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
 <script type="text/javascript">
//Get the button:
mybutton = document.getElementById("scroll");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
  </script>
  <script>
        $(document).ready(function(){
            $('#long_description img').each(function(){
                $(this).addClass('img-fluid');
            });
        });</script
</body>
</html>
