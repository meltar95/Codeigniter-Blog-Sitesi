<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h4 class="page-title"><a href="<?php echo base_url('admin/anasayfa/'); ?>">Genel İstatistikler </a> / İçerik Seçenekleri / İçerik Ekle</h4>
			<div class="row">
				<div class="col-md-3">

				</div>
				<div class="col-md-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">İçerik Ekle</h3>
						</div>

							 <?php
									echo $this->session->flashdata('eklemeMesaji');
							 ?>
						<form method="post" action="<?php echo base_url('admin/icerik/ekle/'); ?>" enctype='multipart/form-data'>
						<div class="panel-body">
							<label>İçerik Başlığı</label>
							<input type="text" class="form-control" name="icerikBaslik" placeholder="İçerik Başlığı" required>
							<br>
							<label>İçerik Detayı</label>
							<textarea class="form-control" name="icerikDetay" placeholder="İçerik Detayı" rows="4" required></textarea>
							<script>
											CKEDITOR.replace('icerikDetay');
							</script>
							<br>
							<label>İçerik Sliderda Gösterilsinmi?</label>
							<select class="form-control" name="sliderGorunum" required>
								<option value="1">Evet</option>
								<option value="0">Hayır</option>
							</select>
							<br>
							<label>İçerik BİZİM SEÇTİKLERİMİZ Alanında Gösterilsinmi?</label>
							<select class="form-control" name="bizimSecim" required>
								<option value="1">Evet</option>
								<option value="0">Hayır</option>
							</select>
							<br />
							<label>İçerik Anahtar Kelimeleri</label>
							<input type="text" class="form-control" name="icerikKeyword" placeholder="İçerik Anahtar Kelimeleri" required>
							<br />
							<label>Blog Resmi Seçiniz</label>
							<input type="file" class="form-control" name="file" placeholder="Blog Resmi Seçiniz">
							<br />
							<input type="submit" class="btn btn-success float-r" value="İçeriği Yayınla" name="yayinBtn[1]">
							<input type="submit" class="btn btn-warning" style="color:black;" value="İçeriği Taslak Olarak Kaydet" name="yayinBtn[0]">
						</div>
					</form>
					</div>
				</div>

				<div class="col-md-3">

				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<div class="clearfix"></div>
