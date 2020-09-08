<br>
<center><h3>Film Populer Hari Ini</h3></center>
<br>
<div class="container">
	<div class="card-deck">
	<?php 
		foreach($item as $film){
			echo '<div class="card">
				    <img src="'.base_url().'assets/Images/'.$film['foto'].'" class="card-img-top" alt="'.$film['judul'].'">
				    <div class="card-body">
				      <h5 class="card-title">'.$film['judul'].'</h5>
				      <p class="card-text">'.$film['sinopsis'].'</p>
				      <a href="'.base_url().'home/pesan/'.$film['id_film'].'" class="btn btn-primary">Pesan</a>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>';
	}
	?>
</div>
</div>