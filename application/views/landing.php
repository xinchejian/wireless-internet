<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>XinCheJian Guest Wifi</title>
  </head>

  <body>


    <?php echo form_open('/'); ?>

    <fieldset>
      <legend>Guest</legend>
      <p><?php echo validation_errors(); ?></p>

      <div class="testfield">

      </div>
      <div class="textfield">
        <label for="username">Username</label>                  
        <input type="text" name="username" value=""  />              
      </div>
      <div class="textfield">
        <label for="password">Password</label>                  
        <input type="password" name="password" value=""  />              
      </div>
      <div class="textfield">
        <label for="passconf">Confirm</label>                  
        <input type="password" name="passconf" value=""  />              
      </div>

      <div class="textfield">
        <label for="email">Email</label>                  
        <input type="email" name="email" value=""  />              
      </div>

      <div class="buttons"> 	<input type="submit" name="login" value="Register" class="button"  />              
      </div>

      <div class="notes">By registering you will gain access to the network for 24hours, please <strong>do not</strong> abuse the system or you will be removed and blocked from future attempts.</div>
    </fieldset>
    </form>


  </body>
</html>
