<?php

$meta = [
[
    'charset'     => "utf-8"
],
[
    'http-equiv'  => "X-UA-Compatible",
    'content'     => "IE=edge"
],
[
    'name'    => "viewport",
    'content' => "width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
],
[
    'name'    => "description",
    'content' => "Penghubung Antara Pemilik Kos Dengan Pencari Kos"
],
[
    'name'    => "author",
    'content' => "PT. Telekomunikasi Indonesia, Tbk"
]
];
$link = [
[
    'href'  => 'assets/images/icon.ico',
    'rel'   => 'icon',
    'width' => '100px',
    'type'  => 'image/ico',
],
[
    'href'  => 'assets/lte/dist/css/AdminLTE.min.css',
    'rel'   => 'stylesheet',
],
[
    'href'  => 'assets/lte/dist/css/skins/skin-red.min.css',
    'rel'   => 'stylesheet',
],
[
    'href'  => 'assets/lte/bootstrap/css/bootstrap.min.css',
    'rel'   => 'stylesheet',
],
[
    'href'  => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
    'rel'   => 'stylesheet'
],
[
    'href'  => 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
    'rel'   => 'stylesheet'
],
[
    'href'  => 'assets/lte/plugins/datepicker/datepicker3.css',
    'rel'   => 'stylesheet'
]
];
$cdn = [
[
    'href'  => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
    'rel'   => 'stylesheet',
    // 'integrity' => 'sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u',
    // 'crossorigin' => 'anonymous'
],
[
    'href'  => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
    'rel'   => 'stylesheet',
    // 'integrity' => 'sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp',
    // 'crossorigin' => 'anonymous'
],
[
    'href'  => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
    'rel'   => 'stylesheet'
],
[
    'href'  => 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
    'rel'   => 'stylesheet'
]
];
?>

<?php
echo meta($meta);
echo '<title>' . $title . '</title>';
echo '';
foreach ($link as $href) {
  echo link_tag($href);
}
foreach ($cdn as $href1) {
  //echo link_tag($href1);
}
?>
