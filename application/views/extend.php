<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Extend your XinCheJian Guest Wifi access</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
  </head>

  <body>

    <div id="logo"></div>
    <?php echo form_open('/extend'); ?>

    <fieldset>
      <legend>Extend</legend>
      <p><?php echo validation_errors(); ?><?php echo $this->session->flashdata('error'); ?>  </p>

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
      

      <div class="buttons"> 	
        <input type="submit" name="extend" value="Extend my Access" class="button"  />
      </div>

      <div class="notes">
        <ul>
          <li>You will gain access to the network for an additional 24hours</li>
          <li>Think about becoming a member, 100rmb a month will save you this trouble. speak to a staff member right now</li>
          <li>Abuse and everyone will loose</li>
        </ul>
      </div>
    </fieldset>
    </form>


  </body>
</html>
