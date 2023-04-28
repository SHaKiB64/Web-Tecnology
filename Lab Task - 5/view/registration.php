<!DOCTYPE html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="checkbox"] {
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 10px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #3e8e41;
        }

        .signin-link {
            text-align: center;
            margin-top: 20px;
        }

        .signin-link a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
    <title>SignUP</title>
</head>

<body>
<!-- <script>
    // Get the form element
    const form = document.querySelector('form');

    // Add an event listener to the form submit event
    form.addEventListener('submit', function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the input values
        const name = form.elements['name'].value.trim();
        const email = form.elements['email'].value.trim();
        const phone = form.elements['phone'].value.trim();
        const password = form.elements['password'].value.trim();
        const gender = form.elements['gender'].value;
        const dob = form.elements['dob'].value.trim();
        const image = form.elements['image'].value.trim();

        // Validate the input values
        if (!/^[a-zA-Z]{2,}\s[a-zA-Z]{2,}$/i.test(name)) {
            alert('Name must be two words or more.');
            return;
        }

        if (!/^[\w-.]+@([\w-]+\.)+[\w-]{2,}$/i.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        if (!/^\d{11}$/.test(phone)) {
            alert('Phone number should contain only 11 digits.');
            return;
        }

        if (password.length < 8) {
            alert('Password should be at least 8 characters long.');
            return;
        }

        const today = new Date();
        const birthDate = new Date(dob);
        const age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        if (age < 18) {
            alert('You must be at least 18 years old to register.');
            return;
        }

        if (!image) {
            alert('Please upload an image.');
            return;
        }

        // Submit the form
        form.submit();
    });
</script> -->

    <div class="container">
        <h2 style="text-align: center;">SIGN UP</h2>

        <form action="../controller/createUser.php" method="POST" enctype="multipart/form-data">
            <label for="">Name:</label>
            <input type="text" name="name" id="" required><br><br>
            <label for="">Email:</label>
            <input type="text" name="email" id="" required><br><br>
            <label for="">Phone:</label>
            <input type="text" name="phone" id="" required><br><br>
            <label for="">Password:</label>
            <input type="password" name="password" id="" required><br><br>
            <label for="">Gender:</label>
            <input type="radio" name="gender" value="Female" required>Female
            <input type="radio" name="gender" value="Male" required>Male
            <input type="radio" name="gender" value="Other" required>Other
            <br><br>
            <label for="">Date of Birth:</label>
            <input type="date" name="dob" id="" required><br><br>
            <label for="">Image:</label>
            <input type="file" name="image" id="" width="100" height="100"><br><br>
            <div class="signin-link">
                <p>Already Have an Account ? <a href="login.php">Sign In</a></p>
            </div>
            <input class="btn-submit" type="submit" name="signup" value="Sign Up">
        </form>

    </div>


</body>

</html>