﻿<?php
/* 
تكويد : زاوية مبرمج 
http://www.angle47.com/

 */


/* الإيميل الذي سنستقبل فيه الرسائل */
$myemail  = "info@bawazirstudio.com";

/* التأكد من أن المدخلات غير فارغة */
$email = check_input($_POST['email'], "الرجاء عدم ترك خانة الإيميل فارغة");
$subject  = check_input($_POST['subject'], "الرجاء كتابة عنوان لرسالتك");
$comment = check_input($_POST['comment'], "من فضلك لا تدع نص الرسالة فارغ");

/* التحقق من أن عنوان الإيميل صحيح */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error(" عنوان الإيميل خاطئ ، الرجاء إدخال ايميل صحيح");

}
	/* تهئية الرسالة  */
$message = " السلام عليكم ، 

وصلتك رسالة من صفحة الاتصال على موقعك : 

عنوان الرسالة : $subject
 عنوان الإيميل: $email

نص الرسالة :
$comment

نهاية المحتوى.
";

/* دالة إرسال المحتوى */
mail($myemail, $subject, $message);

/* تحويل المرسل إلى صفحة الشكر */
header('Location: thanks.html');
exit();



/* الدوال المستعملة */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}




function show_error($myError)
{
?>
    <html>
    <body>

    <b>من فضلك صحح الخطأ التالي:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}


?>