<?php
    if (!empty($errors)) :
    ?>
    <div class="errors">
        <p>Your account could not be created, Please check the following:</p>
        <ul>
        <?php
            foreach ($errors as $error) :
            ?>
            <li><?= $error ?></li>
            <?php
                endforeach; ?>
        </ul>
    </div>
<?php
    endif;
?>

    <form action="" method="post">
        <ul class="form-style-1">
            <li>
                <input type="text" id="firstname" name="exec[firstname_CSSA_EXEC]" class="field-divided" placeholder="First name" value="<?=$exec['firstname_CSSA_EXEC']?? ''?>">
                <input type="text" id="lastname" name="exec[lastname_CSSA_EXEC]" class="field-divided" placeholder="Last name" value="<?=$exec['lastname_CSSA_EXEC']?? ''?>">
            </li>

            <li>
                <input type="email" id="email" name="exec[email_CSSA_EXEC]" class="field-long" placeholder="Email" value="<?=$exec['email_CSSA_EXEC']?? ''?>">
            </li>

            <li>
                <input type="text" id="password" name="exec[password_CSSA_EXEC]" class="field-long" placeholder="New password" value="<?=$exec['password_CSSA_EXEC']?? ''?>">
            </li>

            <li>
                <label >Birthday<span class="required">*</span></label>
                <input type="date" id="id" name="exec[birthday_CSSA_EXEC]" class="field-long" value="<?=$exec['birthday_CSSA_EXEC']?? ''?>">
            </li>

            <li>

                <label for="wechat_CSSA_EXEC">Wechat</label>
                <input type="text" id="wechat" name="exec[wechat_CSSA_EXEC]" class="field-divided" value="<?=$exec['wechat_CSSA_EXEC']?? ''?>">
            </li>

            <li>
                <label for="mobile_CSSA_EXEC">Telephone</label>
                <input type="tel" name="mobile" id="exec[mobile_CSSA_EXEC]" class="field-divided" placeholder="123-456-7890" value="<?=$exec['mobile_CSSA_EXEC']?? ''?>">

            <li>
                <label for="studentid_CSSA_EXEC">Student ID<span class="required">*</span></label>
                <input type="text" id="studentid" name="exec[studentid_CSSA_EXEC]" class="field-divided" value="<?=$exec['studentid_CSSA_EXEC']?? ''?>">
            </li>
    
            <li>
                <label for="faculty_CSSA_EXEC">Faculty<span class="required">*</span></label>
                <input type="text" id="faculty" name="exec[faculty_CSSA_EXEC]" class="field-divided" value="<?=$exec['faculty_CSSA_EXEC']?? ''?>">

                <label for="major_CSSA_EXEC">Major<span class="required">*</span></label>
                <input type="text" id="major" name="exec[major_CSSA_EXEC]" class="field-divided" value="<?=$exec['major_CSSA_EXEC']?? ''?>">
            </li>
    

            <li>
                <label for="departmentid_CSSA_EXEC">Department<span class="required">*</span></label>
                <select id="departmentid" name="exec[departmentid_CSSA_EXEC]" class="field-select">
                    <option value="0">-- Select --</option>
                    <option value="1">President</option>
                    <option value="2">External</option>
                    <option value="3">Internal</option>
                    <option value="4">Event</option>
                    <option value="5">Academic</option>
                    <option value="6">Media</option>
                    <option value="7">Communication</option>
                    <option value="8">Finance</option>
                </select>
            </li>
    
            <li>
                <label for="activeness_CSSA_EXEC">Are you still a member of McGill CSSA Exec Team?<span class="required">*</span></label>
                <select id="activeness" name="exec[activeness_CSSA_EXEC]" class="field-select">
                    <option value="0">-- Select --</option>
                    <option value="1">YES</option>
                    <option value="2">NO</option>
                </select>
            </li>
    
            <li>
                <label for="jobtitle_CSSA_EXEC">Job Title<span class="required">*</span></label>
                <select id="jobtitle" name="exec[jobtitle_CSSA_EXEC]" class="field-select">
                    <option value="0">-- Select --</option>
                    <option value="1">Co-President</option>
                    <option value="2">Vice-President</option>
                    <option value="3">Director</option>
                    <option value="4">Executive</option>
                </select>
            </li>

            <li>
                <input type="submit" name="submit" value="Register account">
            </li>
        </ul>
    </form>
