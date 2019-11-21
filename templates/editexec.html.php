<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        .form-style-1 {
            margin:10px auto;
            max-width: 400px;
            padding: 20px 12px 10px 20px;
            font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
        }

        .form-style-1 li {
            padding: 0;
            display: block;
            list-style: none;
            margin: 10px 0 0 0;
        }

        .form-style-1 label{
            margin:0 0 3px 0;
            padding:0px;
            display:block;
            font-weight: bold;
        }

        .form-style-1 .tel-number-field{
            width: 40px;
            text-align: center;
        }

        .form-style-1 input[type=text],
        .form-style-1 input[type=date],
        .form-style-1 input[type=email],
        .form-style-1 input[type=tel],
        textarea,
        select{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            border:1px solid #BEBEBE;
            padding: 7px;
            margin:0px;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
        }

        .form-style-1 input[type=text]:focus,
        .form-style-1 input[type=date]:focus,
        .form-style-1 input[type=email]:focus,
        .form-style-1 input[type=tel]:focus,
        .form-style-1 textarea:focus,
        .form-style-1 select:focus{
            -moz-box-shadow: 0 0 8px #88D5E9;
            -webkit-box-shadow: 0 0 8px #88D5E9;
            box-shadow: 0 0 8px #88D5E9;
            border: 1px solid #88D5E9;
        }

        .form-style-1 .field-divided{
            width: 49%;
        }

        .form-style-1 .field-long{
            width: 100%;
        }

        .form-style-1 .field-select{
            width: 100%;
        }

        .form-style-1 .field-textarea{
            height: 100px;
        }

        .form-style-1 .tel-number-field {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            border: 1px solid #C2C2C2;
            box-shadow: 1px 1px 4px #EBEBEB;
            -moz-box-shadow: 1px 1px 4px #EBEBEB;
            -webkit-box-shadow: 1px 1px 4px #EBEBEB;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            padding: 7px;
            outline: none;
        }

        .form-style-1 input[type=submit], .form-style-1 input[type=button]{
            background: #4B99AD;
            padding: 8px 15px 8px 15px;
            border: none;
            color: #fff;
        }
        .form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
            background: #4691A4;
            box-shadow:none;
            -moz-box-shadow:none;
            -webkit-box-shadow:none;
        }
        .form-style-1 .required{
            color:red;
        }
    </style>
</head>
<body>

<form action="" method="post">
	<input type="hidden" name="id" value="<?=$exec['id_CSSA_EXEC'];?>">
	<ul class="form-style-1">
    <li>
        <label for="firstname_CSSA_EXEC">Full Name<span class="required">*</span></label>
        <input type="text" id="firstname" name="firstname" class="field-divided" placeholder="First" value="<?=$exec['firstname_CSSA_EXEC'];?>" />
        <input type="text" id="lastname" name="lastname" class="field-divided" placeholder="Last" value="<?=$exec['lastname_CSSA_EXEC'];?>"/>
    </li>

    <li>
        <label for="birthday_CSSA_EXEC">Birthday<span class="required">*</span></label>
        <input type="date" id="birthday" name="birthday" class="field-long" value="<?=$exec['birthday_CSSA_EXEC'];?>"/>
    </li>

    <li>
        <label for="email_CSSA_EXEC">Email<span class="required">*</span></label>
        <input type="email" id="email" name="email" class="field-divided" value="<?=$exec['email_CSSA_EXEC'];?>"/>
        <label for="wechat_CSSA_EXEC">Wechat</label>
        <input type="text" id="wechat" name="wechat" class="field-divided" value="<?=$exec['wechat_CSSA_EXEC'];?>"/>
        
    </li>

    <li>
        <label for="mobile_CSSA_EXEC">Telephone</label>
        <input type="tel" name="mobile" id="mobile" class="field-divided" value="<?=$exec['mobile_CSSA_EXEC'];?>" placeholder="123-456-7890"/>
        <!--
        <input type="text" class="tel-number-field" id="mobile1" name="mobile1" value="" maxlength="4" />-<input type="text" class="tel-number-field" id="mobile2" name="mobile2" value="" maxlength="4"  />-<input type="text" class="tel-number-field" id="mobile3" name="mobile3" value="" maxlength="10"/>
    	-->
    </li>


    
    <li>
        <label for="studentid_CSSA_EXEC">Student ID<span class="required">*</span></label>
        <input type="text" id="studentid" name="studentid" class="field-divided" value="<?=$exec['studentid_CSSA_EXEC'];?>"/>
        
    </li>
        <label for="faculty_CSSA_EXEC">Faculty<span class="required">*</span></label>
        <input type="text" id="faculty" name="faculty" class="field-divided" value="<?=$exec['faculty_CSSA_EXEC'];?>"/>
        <label for="major_CSSA_EXEC">Major<span class="required">*</span></label>
        <input type="text" id="major" name="major" class="field-divided" value="<?=$exec['major_CSSA_EXEC'];?>"/>
    <li>

    </li>
    

    <li>
        <label for="departmentid_CSSA_EXEC">Department<span class="required">*</span></label>
        <select id="departmentid" name="departmentid" class="field-select">
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
        <select id="activeness" name="activeness" class="field-select">
            <option value="0">-- Select --</option>
            <option value="1">YES</option>
            <option value="2">NO</option>
        </select>
    </li>
    
    <li>
        <label for="jobtitle_CSSA_EXEC">Job Title<span class="required">*</span></label>
        <select id="jobtitle" name="jobtitle" class="field-select">
            <option value="0">-- Select --</option>
            <option value="1">Co-President</option>
            <option value="2">Vice-President</option>
            <option value="3">Director</option>
            <option value="4">Executive</option>
        </select>
    </li>

    <li>
	<input type="submit" value="Save">
    </li>
    </ul>
</form>
</body>
</html>
