    <div id="form">
    <div class="center"> Register </div><hr>
    <?php if (isset($message)) : ?>
        <div class="formgroup-error">
            ERROR : <?= $message; ?>
        </div>
    </article>
    <?php endif; ?>
    <?= validation_errors('<div class="error">', '</div>'); ?>
    <?= form_open('register'); ?>
        <div>
            <label for="name">Name</label><br>
            <input id="name" type="text" name="name" required>
        </div>
        <div>
            <label for="name">Email</label><br>
            <input id="email" type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="passwordconfirm">Password Confirmation</label><br>
            <input type="password" name="passconf" id="passwordconfirm" required>
        </div>
        <div>
            <label for="mobile">Mobile</label><br>
            <input type="text" id="mobile" name="mobile" required>
        </div>
        <div>
            <label for="dob">Date of Birth</label><br>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div>
            <label for="gender">Gender</label><br>
            <div class="gender">
                <input type="radio" name="gender" id="m" value="m" required>
                <label for="m" style="padding-right: 35px;">Male</label>
                <input type="radio" name="gender" id="f" value="f">
                <label for="f" style="padding-right: 35px;">Female</label>
                <input type="radio" name="gender" id="o" value="o">
                <label for="o" style="padding: 5px;">Others</label>
            </div>
        </div>
        <div>
            <label for="college">College</label><br>
            <select id="college" name="college" class="dropdown1" required>
                <option value="">Please choose an option</option>
                <?php foreach ($colleges as $college) : ?>
                    <option value="<?= $college->id; ?>"><?= $college->college_name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div>
            <label for="city">City</label><br>
            <select id="city" name="city" class="dropdown2" required>
                <option value="">Please choose an option</option>
                <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city->id; ?>"><?= $city->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="state">State</label><br>
            <select id="state" name="state" class="dropdown3" required>
                <option value="">Please choose an option</option>
                <?php foreach ($states as $state) : ?>
                    <option value="<?= $state->id; ?>"><?= $state->name; ?></option>
                <?php endforeach; ?>
            </select> 
        </div>
        <div>
            <label for="department">Department</label><br>
            <input type="text" name="department" id="department" required>
        </div>
        <div>
            <label for="college_id">College Id / College Roll No.</label><br>
            <input type="text" name="college_id" id="college_id" required>
        </div>
        
        <div class="btn">
        <input type="submit" value="Register" name="submit">
        </div>
    </form>
    </div> 
  
  <canvas id="demo-canvas" style="display:none"></canvas>
</div>