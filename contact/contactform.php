<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/creating-a-contact-form.html
*/
require_once("./include/fgcontactform.php");

$formproc = new FGContactForm();


//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('andrewgolden94@gmail.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('CnRrspl1FyEylUj');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>

      <!-- bootstrap -->
      <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
      
      <!-- carousel -->
      <link rel="stylesheet" href="css/gallery-css/gallery.theme.css">
      <link rel="stylesheet" href="css/gallery-css/gallery.min.css">

      <!-- custom css -->
      <link type="css/text" rel="stylesheet" href="css/global.css"/>

      <!-- custom fonts-->
      <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">


      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>

<!-- Form Code Start -->
<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
  <fieldset >

    <input type='hidden' name='submitted' id='submitted' value='1'/>
    <input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
    <input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />


    <div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
    <div class='container'>
        <label for='name'> <span class=main-label>NAME</span>(REQUIRED) </label><br/>
        <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
        <span id='contactus_name_errorloc' class='error'></span>
    </div>
    <div class='container'>
        <label for='email'> <span class=main-label>EMAIL</span>(REQUIRED)</label><br/>
        <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
        <span id='contactus_email_errorloc' class='error'></span>
    </div>
    <div class='container'>
        <label for='subject'> <span class=main-label>SUBJECT</span></label><br/>
        <input type='text' name='subject' id='subject' value='<?php echo $formproc->SafeDisplay('subject') ?>' maxlength="50" /><br/>
        <span id='contactus_email_errorloc' class='error'></span>
    </div>
    <div class='container'>
        <label for='message'> <span class=main-label>MESSAGE<span></label><br/>
        <span id='contactus_message_errorloc' class='error'></span>
        <textarea rows="15" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
    </div>


    <div class='container'>
        <input type='submit' name='Submit' value='SUBMIT' />
    </div>

  </fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

// ]]>
</script>

</body>
</html>