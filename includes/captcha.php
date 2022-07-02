<div class="col-lg-6">
                        <img src="image.php" onclick="this.src='image.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
                        <input type="text" class="form-control" name="captcha"/>
                        <?php if(isset($_POST['captcha']))
                        {
                            if($_POST['captcha']==$_SESSION['code']){
                                echo "Code correct";
                            } else {
                                echo "Code incorrect";
                            }
                        }
                        ?>
                    </div>