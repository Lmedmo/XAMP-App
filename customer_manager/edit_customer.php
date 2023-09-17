<?php include('../view/header.php'); ?>
<main>
    <section>
        <h1>View/Update Customer</h1>
        <form action="index.php" method="POST" id="aligned">
            <input type="hidden" name="action" value="save_customer" />
            <input type="hidden" name="customer_ID" value="<?php echo $customer->getID(); ?>">
            <label>First Name:</label>
            <input type="input" name="fname" placeholder="<?php echo $customer->getFname(); ?>"><br>
            <label>Last Name:</label>
            <input type="input" name="lname" placeholder="<?php echo $customer->getLname(); ?>"><br>
            <label>Address:</label>
            <input type="input" name="address" placeholder="<?php echo $customer->getAddress(); ?>"><br>
            <label>City:</label>
            <input type="input" name="city" placeholder="<?php echo $customer->getCity(); ?>"><br>
            <label>State:</label>
            <select name="state" id="state" size="1" placeholder="<?php echo $customer->getState(); ?>">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="PR">Puerto Rico</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="VI">Virgin Islands</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select><br>
            <label>Postal Code:</label>
            <input type="input" name="postalCode" placeholder="<?php echo $customer->getPostal(); ?>"><br>
            <label>Country Code:</label>
            <input type="input" name="countryCode" placeholder="<?php echo $customer->getCountry(); ?>"><br>
            <label>Phone:</label>
            <input type="input" name="phone" placeholder="<?php echo $customer->getPhone(); ?>"><br>
            <label>Email:</label>
            <input type="input" name="email" placeholder="<?php echo $customer->getEmail(); ?>"><br>
            <label>Password:</label>
            <input type="input" name="password" placeholder="<?php echo $customer->getPassword(); ?>"><br>
            <label>&nbsp;</label>
            <input type="submit" value="Update Customer"><br>
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=customer_list_page">Search Customers</a>
        </p>
    </section>
</main>
<?php include('../view/footer.php') ?>