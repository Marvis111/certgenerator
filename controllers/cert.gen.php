<?php
include 'server.php';

class Certificate
{
	public $username,$certImg,$createdImg,$font,$color;

	public function createCertImg(){
		$image= imagecreatefromjpeg($this->certImg);
		$color = imagecolorallocate($image, 0, 0, 0);
		$this->color = $color;
		$this->createdImg = $image;
		return $this;
	}
	function __construct($username,$CertimgPath,$vp)
	{
		$this->username = $username;
		$this->certImg = $CertimgPath;
		$this->vp = $vp;
	}
	public function setFont($fontPath){
		$dir= dirname(realpath(__FILE__));
		$sep=DIRECTORY_SEPARATOR;   
		$font =$dir.$sep.$fontPath;
		$this->font = $font;
		return $this;
	}
	public function writeOnCert(){
		$image = $this->createdImg;
		$color = $this->color;
		$font = $this->font;
		$username = $this->username ;
		imagettftext($image, 40, 0, 125, 300, $color, $font, $username);
		imagettftext($image,20 , 0, 500, 460, $color, $font, $this->vp);
		return $this;
	}
	public function readFile(){
		imagejpeg($this->createdImg,$this->username.'.jpg');
		if (file_exists($this->username.'.jpg')) {
			header('Content-Description: File Transfer');
			header('content-type:image/jpeg');
			header('Content-Disposition:attachment;filename='.basename($this->username.'.jpg'));
			header('Content-Length:'.filesize($this->username.'.jpg'));
			readfile($this->username.'.jpg');
		}
		
	}
};
//download as image...
if (isset($_POST['downloadcert'])) {
	$newCert = new Certificate($_SESSION['username'],'../controllers/certificate.jpg','Okeke Johnpaul');
	$newCert->createCertImg()->setFont('OpenSans-Regular.ttf')->writeOnCert()->readFile();
}
