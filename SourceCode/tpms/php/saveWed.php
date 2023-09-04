<?php
  include "dbconn.php";
  if(isset($_POST['btn-save'])){
    $groom = $_POST['groom'];
    $bride = $_POST['bride'];
    $email = $_POST['email'];
    $gContact = $_POST['gContact'];
    $bContact = $_POST['bContact'];
    $gAddress = $_POST['gAddress'];
    $bAddress = $_POST['bAddress'];
    $package = $_POST['package'];
    $intention = $_POST['intention'];
    $wdate = $_POST['wdate'];
    $resTime = $_POST['resTime'];
    $amount = $_POST['amount'];
    $transactDate = $_POST['transactDate'];

    $location = "wedding/";
    $file1 = $_FILES['gBirthCert']['name'];
    $file_tmp1 = $_FILES['gBirthCert']['tmp_name'];

    $file2 = $_FILES['bBirthCert']['name'];
    $file_tmp2 = $_FILES['bBirthCert']['tmp_name'];

    $file3 = $_FILES['gBapCert']['name'];
    $file_tmp3 = $_FILES['gBapCert']['tmp_name'];

    $file4 = $_FILES['bBapCert']['name'];
    $file_tmp4 = $_FILES['bBapCert']['tmp_name'];

    $file5 = $_FILES['gConCert']['name'];
    $file_tmp5 = $_FILES['gConCert']['tmp_name'];

    $file6 = $_FILES['bConCert']['name'];
    $file_tmp6 = $_FILES['bConCert']['tmp_name'];

    $file7 = $_FILES['cenomar']['name'];
    $file_tmp7 = $_FILES['cenomar']['tmp_name'];

    $file8 = $_FILES['marriageLicense']['name'];
    $file_tmp8 = $_FILES['marriageLicense']['tmp_name'];

    $file9 = $_FILES['3RPic1']['name'];
    $file_tmp9 = $_FILES['3RPic1']['tmp_name'];

    $file10 = $_FILES['3RPic2']['name'];
    $file_tmp10 = $_FILES['3RPic2']['tmp_name'];

    $file11 = $_FILES['MBPic1']['name'];
    $file_tmp11 = $_FILES['MBPic1']['tmp_name'];

    $file12 = $_FILES['MBPic2']['name'];
    $file_tmp12 = $_FILES['MBPic2']['tmp_name'];

    $file13 = $_FILES['receipt']['name'];
    $file_tmp13 = $_FILES['receipt']['tmp_name'];

    $data = [];
    $data = [$file1,$file2,$file3,$file4,$file5,$file6,$file7,$file8,$file9,$file10,$file11,$file12,$file13];
    $images= implode(' ',$data);
    $query = "INSERT INTO tpms (groom,bride,email,gContact,bContact,gAdress,bAdress,package,intention,wdate,resTime,amount,transactDate,images)"
    $fire = mysqli_query($conn,$query);

    if($fire){
      move_uploaded_file($file_tmp1, $location.$file1);
      move_uploaded_file($file_tmp2, $location.$file2);
      move_uploaded_file($file_tmp3, $location.$file3);
      move_uploaded_file($file_tmp4, $location.$file4);
      move_uploaded_file($file_tmp5, $location.$file5);
      move_uploaded_file($file_tmp6, $location.$file6);
      move_uploaded_file($file_tmp7, $location.$file7);
      move_uploaded_file($file_tmp8, $location.$file8);
      move_uploaded_file($file_tmp9, $location.$file9);
      move_uploaded_file($file_tmp10, $location.$file10);
      move_uploaded_file($file_tmp11, $location.$file11);
      move_uploaded_file($file_tmp12, $location.$file12);
      move_uploaded_file($file_tmp13, $location.$file13);
      echo "success";
    }
    else{
      echo "error";
    }
}

?>