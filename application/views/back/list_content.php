		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">İçerik Listesi</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-body">
									<table id="myTable">
										<thead>
											<tr>
												<th>#</th>
												<th>İçerik Başlığı</th>
												<th>İçerik</th>
												<th>Görüntülenme Sayısı</th>
												<th>Slider Gösterim Durumu</th>
												<th>Bizim Seçtiğimiz İçerik mi</th>
												<th>Yayın Durumu</th>
												<th>İşlem Seçenekleri</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($icerik_list as $value)
											{
											?>
											<tr>
												<td><?php echo $value->bc_id; ?></td>
												<td><?php echo $value->bc_title; ?></td>
												<td><?php echo mb_substr($value->bc_text,0,50); ?></td>
												<td><?php echo $value->bc_displayed; ?></td>
												<td>
													<?php
														switch ($value->bc_sliderStatu)
														{
															case 0:
													?>
														<button type="button" class="btn btn-warning color-b">MEVCUT DEĞİL</button>
													<?php
																break;

																case 1:
													?>
														<button type="button" class="btn btn-success">MEVCUT</button>
													<?php
																	break;

															default:
													?>
															<button type="button" class="btn btn-danger">GEÇERSİZ STATU DEĞERİ</button>
													<?php
																// code...
																break;
														}
													?>
												</td>
												<td>
													<?php
														switch ($value->bc_ofav)
														{
															case 0:
													?>
														<button type="button" class="btn btn-warning color-b">HAYIR</button>
													<?php
																break;

																case 1:
													?>
														<button type="button" class="btn btn-success">EVET</button>
													<?php
																	break;

															default:
													?>
															<button type="button" class="btn btn-danger">GEÇERSİZ STATU DEĞERİ</button>
													<?php
																// code...
																break;
														}
													?>
												</td>
												<td>
													<?php
														switch ($value->bc_statu)
														{
															case 0:
													?>
														<button type="button" class="btn btn-warning color-b">YAYINDA DEĞİL</button>
													<?php
																break;

																case 1:
													?>
														<button type="button" class="btn btn-success">YAYINDA</button>
													<?php
																	break;

															default:
													?>
															<button type="button" class="btn btn-danger">GEÇERSİZ STATU DEĞERİ</button>
													<?php
																// code...
																break;
														}
													?>
												</td>
												<td><button type="button" class="btn btn-warning color-b"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>&nbsp;<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
											</tr>
											<?php
												// code...
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
