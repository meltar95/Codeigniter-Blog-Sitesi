<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BackModel');
		// if (!isset($this->session->admin_ses))
		// {
		// 	redirect('admin/giris/');
		// }
		// else
		// {
		// 	$this->load->model('BackModels/BackModel');
		// 	$this->load->library("form_validation");
		// }
	}

	public function index()
	{
		$this->load->view('back/inc/header');
		$this->load->view('back/home');
		$this->load->view('back/inc/footer');
	}

	public function icerikEkle()
	{
		$icerikBaslik = $this->input->post('icerikBaslik');
		if(isset($icerikBaslik))
		{
			$this->load->library("form_validation");
			$this->form_validation->set_rules("icerikBaslik", "İçerik Başlığı", "trim|required|is_unique[blog_content.bc_title]|max_length[39]|min_length[5]|xss_clean");
			$this->form_validation->set_rules("icerikDetay", "İçerik Detayı", "trim|required|min_length[5]|xss_clean");
			$this->form_validation->set_rules("sliderGorunum", "İçerik Sliderda Gösterilsinmi", "trim|required|xss_clean");
			$this->form_validation->set_rules("bizimSecim", "İçerik BİZİM SEÇTİKLERİMİZ Alanında Gösterilsinmi", "trim|required|xss_clean");
			$this->form_validation->set_rules("icerikKeyword", "İçerik Anahtar Kelimeleri", "trim|required|max_length[255]|min_length[5]|xss_clean");

			$this->form_validation->set_message(
				array(
					"required"      => "{field} boş bırakılmamalıdır.",
					"is_unique"     => "{field} başka bir içerkte kullanılıyor.",
					"max_length"    => "{field} en fazla {param} karakter olmalıdır.",
					"min_length"    => "{field} en az {param} karakter olmalıdır."
				)
			);
			$viewData = new stdClass();

			if ($this->form_validation->run())
			{
				if($this->input->post('yayinBtn') != NULL )
				{
					$data = array();
					if(!empty($_FILES['file']['name']))
					{
						// Set preference
						$config['upload_path'] = 'assets/front/img/uploads/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['max_size'] = '3000'; // max_size in kb
						$config['file_name'] = $_FILES['file']['name'];
						$config['encrypt_name'] = TRUE;

						$this->load->library('upload',$config);

						// File upload
						if($this->upload->do_upload('file'))
						{
							$this->load->library('SafeURL');
							$safeURL = new SafeURL;
							$uploadData = $this->upload->data();
							$filename = $uploadData['file_name'];

							$icerikData = array(
								'bc_banner' => 'assets/front/img/uploads/' . $filename,
								'bc_title' => $this->input->post('icerikBaslik'),
								'bc_slug' => $safeURL->seo($this->input->post('icerikBaslik')),
								'bc_text' => $this->input->post('icerikDetay'),
								'bc_sliderStatu' => $this->input->post('sliderGorunum'),
								'bc_ofav' => $this->input->post('bizimSecim'),
								'bc_statu' => array_keys($this->input->post('yayinBtn'))[0],
								'SeoSettings_title' => $this->input->post('icerikBaslik'),
								'SeoSettings_desc' => mb_substr($this->input->post('icerikDetay'), 0, 300),
								'SeoSettings_keyword' => $this->input->post('icerikKeyword')
							);

							$result = $this->BackModel->icerikEkle_db($icerikData);
							switch ($result)
							{
								case 0:
								$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-warning alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4><i class="fa fa-exclamation-triangle"></i> Uyarı!</h4>
								 İçerik Eklenirken Hata Oluştu.
								</div>');
								redirect('admin/icerik/ekle/');
									break;

								case 1:
								$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4><i class="fa fa-check-circle"></i> Uyarı!</h4>
								 İçerik Başarıyla Eklendi.
								</div>');
								redirect('admin/icerik/ekle/');
									break;

								default:
								$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4><i class="fa fa-times-circle"></i> Uyarı!</h4>
								 İçerik Ekleme İşlem Sonucu Tanımlı Olmayan Bir Değer Döndürdü.
								</div>');
								redirect('admin/icerik/ekle/');
									break;
							}
						}
						else
						{
							$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<h4><i class="fa fa-exclamation-triangle"></i> Uyarı!</h4>
							 Dosya Boyutu En Fazla 3MB ve JPG, JPEG, PNG, veya GIF Formatında Olmalıdır.
							</div>');
							redirect('admin/icerik/ekle/');
						}
					}
					else
					{
						$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4><i class="fa fa-exclamation-triangle"></i> Uyarı!</h4>
						 Lütfen İçerik İçin Bir Resim Seçiniz.
						</div>');
						redirect('admin/icerik/ekle/');
					}
				}
				else
				{
					$viewData->form_errors = validation_errors();
					$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4><i class="fa fa-exclamation-triangle"></i> Uyarı!</h4>
					 Lütfen İçerik İçin Bir Resim Seçiniz.
					</div>');
					redirect('admin/icerik/ekle/');
				}
			}
			else
			{
				$viewData->form_errors = validation_errors();
				$this->session->set_flashdata('eklemeMesaji', '<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4><i class="fa fa-exclamation-triangle"></i> Uyarı!</h4>
				'.$viewData->form_errors.'
				</div>');
				redirect('admin/icerik/ekle/');
			}
		}
		else
		{
			$this->load->view('back/inc/header');
			$this->load->view('back/add_content');
			$this->load->view('back/inc/footer');
		}
	}

	public function icerikListe()
	{
		$data['icerik_list'] = $this->BackModel->icirek_listele();
		$this->load->view('back/inc/header');
		$this->load->view('back/list_content', $data);
		$this->load->view('back/inc/footer');
	}
}
