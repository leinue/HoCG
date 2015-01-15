<?php 

/**
* 上传图片类
*/
class uploadPic{

  function upload(
    $max_file_size=2000000,$destination_folder,$formname){
     //上传文件类型列表
    $uptypes=array(
      'image/jpg',
      'image/jpeg',
      'image/png',
      'image/pjpeg',
      'image/gif',
      'image/bmp',
      'image/x-png'
    );

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!is_uploaded_file($_FILES[$formname]["tmp_name"])){
            //图片不存在
            return -1;
            exit;
        }

        $file = $_FILES[$formname];
        if($max_file_size < $file["size"]){
            //文件太大!
            return -2;
            exit;
        }

        if(!in_array($file["type"], $uptypes)){
            //文件类型不符!".$file["type"]
            return -3;
            exit;
        }

        if(!file_exists($destination_folder)){
            mkdir($destination_folder);
        }

        $filename=$file["tmp_name"];
        $image_size = getimagesize($filename);
        $pinfo=pathinfo($file["name"]);
        $ftype=$pinfo['extension'];
        $destination = $destination_folder.time().".".$ftype;//文件名
        if (file_exists($destination) && $overwrite != true){
            //同名文件已经存在了
            return -4;
            exit;
        }

        if(!move_uploaded_file ($filename, $destination)){
            //移动文件出错
            return -5;
            exit;
        }

        $pinfo=pathinfo($destination);
        $fname=$pinfo["basename"];

        /*$final_data=array(
          "dest" => $destination_folder.$fname,
          "width" => $image_size[0],
          "height" => $image_size[1],
          );*/

        return $destination_folder.$fname;
        //echo " <font color=red>已经成功上传</font><br>文件名:  <font color=blue>".$destination_folder.$fname."</font><br>";
        //echo " 宽度:".$image_size[0];
        //echo " 长度:".$image_size[1];
        //echo "<br> 大小:".$file["size"]." bytes";
    }

  }
}

?>