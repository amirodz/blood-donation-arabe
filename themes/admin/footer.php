 
 
 


 
 </div>  <!-- page-content-wrapper --> 

	   </div> <!-- d-flex -->



  <!-- javascrips imports -->
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.bundle.min.js"); ?>"></script>

  <script src="<?php echo base_url(); ?>assets/template-functions.js"></script>
  
<script type="text/javascript" src="<?php echo base_url();?>assets/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/summernote/summernote-ar-AR.min.js"></script>
<script src="<?php echo base_url();?>assets/summernote/summernote-ext-iframe.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/summernote/summernote-classes.js"></script>

<!-- elFinder JS (REQUIRED) -->
<script src="<?php echo base_url();?>assets/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/elFinder/js/elfinder.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/elFinder/js/i18n/elfinder.ar.js"></script>

<script src="<?php echo base_url();?>assets/summernote/summernote-ext-elfinder.js" type="text/javascript"></script>

 <script type="text/javascript">

    $(document).ready(function() {
      $('#read_more').summernote({
		lang : 'ar-AR',  
        height: 400,
        tabsize: 2,
		//tooltip: false,
       // followingToolbar: true,
		toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link', 'video', 'elfinder']],
          ['view', ['iframe','fullscreen', 'codeview', 'undo', 'redo', 'help']]
        ]
      });
    });
  </script>
<script type="text/javascript">

    $(function() {
      $('#post_content').summernote({
		lang : 'ar-AR',
		height: 400,
       // tabsize: 2,
       // followingToolbar: true,
		toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link', 'video', 'elfinder']],
          ['view', ['iframe','fullscreen', 'codeview', 'undo', 'redo', 'help']]
        ]
        });

        });
		
      function elfinderDialog(context) {
      	var fm = $('<div/>').dialogelfinder({
      		url : '<?php echo base_url();?>Elfinder_lib/connect', // change with the url of your connector
      		lang : 'ar',
      		width : 840,
      		height: 450,
      		destroyOnClose : true,
      		getFileCallback : function(files, fm) {
      			console.log(files);
      			//$('#post_content').summernote('editor.insertImage', files.url);
				context.invoke('editor.insertImage',files.url);

      		},
      		commandsOptions : {
      			getfile : {
      			oncomplete : 'close',
      			folders : false
      			}
      		}
      	}).dialogelfinder('instance');
      }

  
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
</body>

</html>