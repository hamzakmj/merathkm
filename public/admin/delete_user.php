<?php
require __DIR__ . '/../../../merath/src/bootstrap.php';
 if(delete_user_by_id($_GET['delete_id']))
 {
    
    redirect_with_message(
        '/../../../merath/public/admin/ManageUser.php',
        'تم حذف ملف المستخدم',FLASH_SUCCESS
    );
 }
 else{
    redirect_with_message(
        '/../../../merath/public/admin/createuser.php',
        'المستخدم ليس موجود',FLASH_ERROR
    );
 }

