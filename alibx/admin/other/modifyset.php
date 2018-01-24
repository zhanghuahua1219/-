<?php
header("content-type:text/html;charset=utf8");

$name = $_POST['site_name'];
$desc = $_POST['site_description'];
$keys = $_POST['site_keywords'];
$status = isset($_POST['comment_status']) ? $_POST['comment_status'] : 0;
$reviewed = isset($_POST['comment_reviewed']) ? $_POST['comment_reviewed'] : 0;

$tmp = include '../public/site.conf.php';
$old_logo = $tmp['site_logo'];

$upfile_path = "";
if($_FILES['logo']['error'] == 0) {
    $ext = strrchr($_FILES['logo']['name'], '.');
    $upfile_path = "../../uploads/".time().rand(100,999).$ext;
    move_uploaded_file($_FILES['logo']['tmp_name'], $upfile_path);
}

if($upfile_path != "") {
    unlink($old_logo);
} else {
    $upfile_path = $old_logo;
}

$fp = fopen('../public/site.conf.php', 'w');
$str = "<?php
return array(
    'site_logo' => '{$upfile_path}',
    'site_name' => '{$name}',
    'site_desc' => '{$desc}',
    'site_keys' => '{$keys}',
    'site_cmts' => $status,
    'site_allow'=> $reviewed
);";

fwrite($fp,$str);
echo "重新设置成功";
header('Refresh:2;url=settings.php');

?>