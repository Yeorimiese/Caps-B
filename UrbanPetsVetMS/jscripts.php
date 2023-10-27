<!--jquery min js-->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="assets/js/slinky.menu.js"></script>
<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<script src="assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="assets/js/mask.init.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9N071f-dwiyVB3WtyD3KH1LySx4bf6HA"></script>
<script src="assets/gmaps/gmaps.js"></script>

<script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
	$(document).ready(function() {
	    // Basic
	    $('.dropify').dropify();

	    // Translated
	    $('.dropify-fr').dropify({
	        messages: {
	            default: 'Glissez-déposez un fichier ici ou cliquez',
	            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
	            remove: 'Supprimer',
	            error: 'Désolé, le fichier trop volumineux'
	        }
	    });

	    // Used events
	    var drEvent = $('#input-file-events').dropify();

	    drEvent.on('dropify.beforeClear', function(event, element) {
	        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
	    });

	    drEvent.on('dropify.afterClear', function(event, element) {
	        alert('File deleted');
	    });

	    drEvent.on('dropify.errors', function(event, element) {
	        console.log('Has Errors');
	    });

	    var drDestroy = $('#input-file-to-destroy').dropify();
	    drDestroy = drDestroy.data('dropify')
	    $('#toggleDropify').on('click', function(e) {
	        e.preventDefault();
	        if (drDestroy.isDropified()) {
	            drDestroy.destroy();
	        } else {
	            drDestroy.init();
	        }
	    })
	});
</script>

