<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>XinCheJian Guest Wifi</title>
    <link rel="stylesheet" href="/assets/css/style.css" />

  </head>

  <body>

    <div id="logo"></div>
    <?php echo form_open('/'); ?>

    
    
    <fieldset>
    
      <?php echo $windows; ?>
      
      <legend>Guest</legend>
      <p><?php echo validation_errors(); ?></p>


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

      <div class="buttons"> 	
        <input type="submit" name="login" value="Register" class="button"  />
        <a href="/extend" class="button"><span>already registered</span></a>
      </div>

      <div class="notes">
        <ul>
          <li>By registering, this helps us know a little more about you, in return you'll get 24hour access to the nextwork</li>
          <li>Password saved are <b>not</b> Guaranteed to be secure</li>
          <li>..Abuse and loose..</li>
        </ul>
      </div>
    </fieldset>
    </form>


  </body>
</html>
