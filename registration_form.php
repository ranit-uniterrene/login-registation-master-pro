        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <div class="login-form">
                <div class="form-group">
                    <input name="reg_name" type="text" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_name']) ? $_REQUEST['reg_name'] : null); ?>"
                           placeholder="Username" id="reg-name">
                    <label class="login-field-icon fui-user" for="reg-name"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_email" type="email" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_email']) ? $_REQUEST['reg_email'] : null); ?>"
                           placeholder="Email" id="reg-email">
                    <label class="login-field-icon fui-mail" for="reg-email"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_password" type="password" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_password']) ? $_REQUEST['reg_password'] : null); ?>"
                           placeholder="Password" id="reg-pass">
                    <label class="login-field-icon fui-lock" for="reg-pass"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_website" type="text" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_website']) ? $_REQUEST['reg_website'] : null); ?>"
                           placeholder="Website(optional)" id="reg-website"/>
                    <label class="login-field-icon fui-chat" for="reg-website"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_fname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_fname']) ? $_REQUEST['reg_fname'] : null); ?>"
                           placeholder="First Name" id="reg-fname"/>
                    <label class="login-field-icon fui-user" for="reg-fname"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_lname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_lname']) ? $_REQUEST['reg_lname'] : null); ?>"
                           placeholder="Last Name" id="reg-lname"/>
                    <label class="login-field-icon fui-user" for="reg-lname"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_nickname" type="text" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_nickname']) ? $_REQUEST['reg_nickname'] : null); ?>"
                           placeholder="Nickname" id="reg-nickname"/>
                    <label class="login-field-icon fui-user" for="reg-nickname"></label>
                </div>
 
                <div class="form-group">
                    <input name="reg_bio" type="text" class="form-control login-field"
                           value="<?php echo(isset($_REQUEST['reg_bio']) ? $_REQUEST['reg_bio'] : null); ?>"
                           placeholder="About / Bio" id="reg-bio"/>
                    <label class="login-field-icon fui-new" for="reg-bio"></label>
                </div>
 
                <input class="btn btn-primary btn-lg btn-block" type="submit" name="reg_submit" value="Register"/>
               </div> 
        </form>