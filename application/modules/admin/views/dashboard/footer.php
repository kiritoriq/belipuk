
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0 <!-- <small><i>created by thor</i></small> -->
    </div>
    <strong>Copyright &copy; 2020 <a target="_blank" href="http://www.pusri.co.id/">PT Pupuk Sriwidjaja Palembang</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function() {
    // $('#utama').load('<?php echo base_url() ?>admin/home').fadeIn(1000);
    // var tampilkan = $('#utama');
    // var loading = $('#loading-state');
    // $('aside ul li').click(function(){
    //   console.log($(this));
    //   if($(this)[0].lastElementChild.className == "treeview-menu") {
    //     $(this)[0].attributes[0].class = "treeview-menu-open";
    //     console.log('clicked');
    //     $('ul li a').click(function(e) {
    //       e.preventDefault();
    //       tampilkan.hide();
    //       loading.fadeIn();
    //       $.ajax({
    //         url: $(this).attr('href'),
    //         type: 'POST',
    //         success: function(response) {
    //           loading.fadeOut();
    //           tampilkan.html(response);
    //           tampilkan.fadeIn(1000);
    //         }
    //       });
    //     })
    //   } else {
		// 		tampilkan.hide();
		// 		//footer.hide();
		// 		loading.fadeIn();
		// 		$.ajax({
		// 			url: $(this).attr('href'),
		// 			type: "POST",
		// 			success: function(msg){
		// 				loading.fadeOut();
		// 				tampilkan.html(msg);
		// 				tampilkan.fadeIn(1000);
		// 				//footer.fadeIn(2000);
		// 			}
		// 		});
    //   }
    //     $('aside ul li ul li').removeClass('active');
    //     $('aside ul li ul li').addClass('active');
		// 		return false;
		// 	});

  })
</script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
</body>
</html>