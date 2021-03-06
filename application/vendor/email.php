<?php
// function untuk membaca konten file
function get_content($url){
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}

// function pengiriman email dengan attachment
function kirimEmail($id, $email)
{
   // setting nama file attachment
   $namafile = "Kartu_Masuk_UJF22.pdf";
   // MIME type file PDF sbg attachment
   $fileType = "application/x-pdf";

   // setting pesan intro di email
    $introPesan = "Terimakasih sudah melakukan pendaftaran.
	 Kartu masuk Jobfair Udinus ada di attachment email ini, silakan disimpan dan printlah (disarankan dengan ukuran kertas A5) sebagai tanda masuk area Jobfair Udinus.";

   // membaca isi file pdf registrasi berdasarkan id
   // yang dihasilkan oleh script pdf.php
    $fileContent = get_content("localhost/tiket_JF22/pdf.php?id=".$id);

   // membuat attachment di email
   $semi_rand = md5(time());
   $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

   $headers = "MIME-Version: 1.0\n" .
              "Content-Type: multipart/mixed;\n" .
              " boundary=\"{$mime_boundary}\"";

   $pesan = "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" .
            $introPesan . "\n\n";

   $data = chunk_split(base64_encode($fileContent));

   $pesan .= "--{$mime_boundary}\n" .
             "Content-Type: {$fileType};\n" .
             " name=\"{$namafile}\"\n" .
             "Content-Disposition: attachment;\n" .
             " filename=\"{$namafile}\"\n" .
             "Content-Transfer-Encoding: base64\n\n" .
             $data . "\n\n" .
             "--{$mime_boundary}--\n";

   // proses mengirim email dengan attachment
   mail($email, "Kartu Masuk Jobfair Udinus", $pesan, $headers);
}
?>
