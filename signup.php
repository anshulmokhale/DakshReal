<!-- signup.php -->

<!DOCTYPE html>
<!-- Designed by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form id="signupForm">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="fullname" placeholder="Enter your full name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="tel" name="phonenumber" placeholder="Enter your phone number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" id="password1" class="password-input" name="password" placeholder="Enter your password" required>
                        <button type="button" id="generate-button" class="btn btn-primary" style='margin-top: 2px; background: #fff; border: 1px solid #888; border-radius: 10px; color: #111; padding: 4px 10px; border-bottom: 2px solid #888;'>Generate</button>
                        <button type="button" id="preview-button" class="btn btn-primary" style='margin-top: 2px; background: #fff; border: 1px solid #888; border-radius: 10px; color: #111; padding: 4px 10px; border-bottom: 2px solid #888;'>Preview</button>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="password2" class="password-input" name="confirmpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Select Option</span>
                        <select id="selectOption" name="usertype" style="height: 45px; width: 100%; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease; margin-bottom: 15px;" onchange="showAdditionalFields()">
                            <option value="user">User</option>
                            <option value="agent">Agent</option>
                            <option value="company">Company</option>
                        </select>
                    </div>
                </div>

                <div class="user-details" id="textField1Container" style="display: none;">
                    <div class="input-box">
                        <span class="details">Experience</span>
                        <select name="experience" style="height: 45px; width: 100%; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease; margin-bottom: 15px;">
                            <option value="1">1 - Beginner</option>
                            <option value="2">2 - Intermediate</option>
                            <option value="3">3 - Advanced</option>
                            <option value="4">More than 3 years</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Working in how many companies</span>
                        <select name="working_companies" style="height: 45px; width: 100%; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px; transition: all 0.3s ease; margin-bottom: 15px;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">More than 3</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Why should we join you</span>
                        <textarea name="desc" rows="4" cols="95" maxlength="150" placeholder=" Enter additional notes"></textarea>
                    </div>
                </div>

                <div class="user-details" id="textField2Container" style="display: none;">
                    <div class="input-box">
                        <span class="details">CompanyName</span>
                        <input type="text" name="company_name" placeholder="Enter Company Name">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone NO</span>
                        <input type="text" name="phone_no" placeholder="Phone No">
                    </div>
                    <div class="input-box">
                        <span class="details">Website Url</span>
                        <input type="text" name="website_url" placeholder="Url">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="company_email" placeholder="email">
                    </div>
                    <div class="input-box">
                        <span class="details">Company Size</span>
                        <input type="text" name="company_size" placeholder="Company Size">
                    </div>
                    <div class="input-box">
                        <span class="details">Why should we join your profile</span>
                        <textarea name="join_profile_notes" rows="4" cols="45" maxlength="150" placeholder=" Enter additional notes"></textarea>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <div id="alreadyHaveAccount">
                Already have an account? <a href="user/login.php">Login here</a>
            </div>
            <div id="responseMessage"></div>
        </div>
    </div>

    <script>
        const generateButton = document.getElementById("generate-button");
        const passwordInput1 = document.getElementById("password1");
        const passwordInput2 = document.getElementById("password2");
        const previewButton = document.getElementById("preview-button");

        function generatePassword() {
            const length = 12; // You can change the length of the password here
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let password = "";

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }

            return password;
        }

        generateButton.addEventListener("click", function() {
            const newPassword = generatePassword();
            passwordInput1.value = newPassword;
            passwordInput2.value = newPassword;
        });

        // Toggle password visibility
        previewButton.addEventListener("click", function() {
            const passwordInputs = document.querySelectorAll(".password-input");
            passwordInputs.forEach(input => {
                if (input.type === "password") {
                    input.type = "text";
                } else {
                    input.type = "password";
                }
            });
        });

        // Client-side validation and AJAX form submission
        const signupForm = document.getElementById('signupForm');
        const responseMessage = document.getElementById('responseMessage');

        signupForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(signupForm);

            // Send the form data to process_signup.php using AJAX
            fetch('process_signup.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Display the response message on the page
                    // responseMessage.innerHTML = data;
                    alert(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    responseMessage.innerHTML = '<p>Oops! Something went wrong.</p>';
                });
        });

        function showAdditionalFields() {
            var selectOption = document.getElementById("selectOption");
            var textField1Container = document.getElementById("textField1Container");
            var textField2Container = document.getElementById("textField2Container");

            if (selectOption.value === "agent") {
                textField1Container.style.display = "flex";
                textField2Container.style.display = "none";
            } else if (selectOption.value === "company") {
                textField1Container.style.display = "none";
                textField2Container.style.display = "flex";
            } else {
                textField1Container.style.display = "none";
                textField2Container.style.display = "none";
            }
        }
    </script>

</body>

</html>