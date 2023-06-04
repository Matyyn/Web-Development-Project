import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class SignupSigninTestCase(unittest.TestCase):
    def setUp(self):
        # Set up Chrome options for headless mode
        chrome_options = webdriver.ChromeOptions()
        chrome_options.add_argument("--headless")

        # Path to the local ChromeDriver executable
        webdriver_path = "C:\Chrome Web Driver"

        # Create a new instance of the Chrome driver
        self.driver = webdriver.Chrome(executable_path=webdriver_path, options=chrome_options)

        # Open the web application URL
        self.driver.get("http://18.142.122.8/register")

    def tearDown(self):
        # Close the browser
        self.driver.quit()

    def test_signup_with_valid_details(self):
        # Find the signup link and click it
        signup_link = self.driver.find_element_by_link_text("Signup")
        signup_link.click()

        # Find the input fields and submit button
        name_input = self.driver.find_element_by_id("name")
        email_input = self.driver.find_element_by_id("email")
        password_input = self.driver.find_element_by_id("password")
        confirm_password_input = self.driver.find_element_by_id("confirm-password")
        signup_button = self.driver.find_element_by_id("signup-button")

        # Enter valid user details into the input fields
        name_input.clear()
        name_input.send_keys("Abdul Mateen")
        email_input.clear()
        email_input.send_keys("mateen.2k19@gmail.com")
        password_input.clear()
        password_input.send_keys("password123")
        confirm_password_input.clear()
        confirm_password_input.send_keys("password123")

        # Click the signup button
        signup_button.click()

        success_message = self.driver.find_element_by_id("success-message")
        self.assertEqual(success_message.text, "Signup Successful")

    def test_signup_with_missing_fields(self):
        # Find the signup link and click it
        signup_link = self.driver.find_element_by_link_text("Register")
        signup_link.click()

        # Find the submit button
        signup_button = self.driver.find_element_by_id("signup-button")

        # Click the signup button without entering any details
        signup_button.click()

        # Verify error messages for missing fields
        name_error_message = self.driver.find_element_by_id("name-error")
        self.assertEqual(name_error_message.text, "Please enter your name")

        email_error_message = self.driver.find_element_by_id("email-error")
        self.assertEqual(email_error_message.text, "Please enter your email")

        password_error_message = self.driver.find_element_by_id("password-error")
        self.assertEqual(password_error_message.text, "Please enter a password")

        confirm_password_error_message = self.driver.find_element_by_id("confirm-password-error")
        self.assertEqual(confirm_password_error_message.text, "Please confirm your password")

    def test_signup_with_mismatched_passwords(self):
        # Find the signup link and click it
        signup_link = self.driver.find_element_by_link_text("Register")
        signup_link.click()

        # Find the input fields and submit button
        password_input = self.driver.find_element_by_id("password")
        confirm_password_input = self.driver.find_element_by_id("confirm-password")
        signup_button = self.driver.find_element_by_id("signup-button")

        # Enter valid user details into the input fields
        password_input.clear()
        password_input.send_keys("password123")
        confirm_password_input.clear()
        confirm_password_input.send_keys("differentpassword")

        # Click the signup button
        signup_button.click()

        # Verify error message for mismatched passwords
        password_error_message = self.driver.find_element_by_id("password-error")
        self.assertEqual(password_error_message.text, "Passwords do not match")

        confirm_password_error_message = self.driver.find_element_by_id("confirm-password-error")
        self.assertEqual(confirm_password_error_message.text, "Passwords do not match")

    def test_signin_with_valid_credentials(self):
        # Find the signin link and click it
        signin_link = self.driver.find_element_by_link_text("Signin")
        signin_link.click()

        # Find the input fields and submit button
        email_input = self.driver.find_element_by_id("email")
        password_input = self.driver.find_element_by_id("password")
        signin_button = self.driver.find_element_by_id("signin-button")

        # Enter valid user credentials into the input fields
        email_input.clear()
        email_input.send_keys("mateen.2k19@gmail.com")
        password_input.clear()
        password_input.send_keys("password123")

        # Click the signin button
        signin_button.click()

        # Verify successful signin
        welcome_message = self.driver.find_element_by_id("welcome-message")
        self.assertEqual(welcome_message.text, "Welcome, Abdul Mateen!")

    def test_signin_with_invalid_credentials(self):
        # Find the signin link and click it
        signin_link = self.driver.find_element_by_link_text("Signin")
        signin_link.click()

        # Find the input fields and submit button
        email_input = self.driver.find_element_by_id("email")
        password_input = self.driver.find_element_by_id("password")
        signin_button = self.driver.find_element_by_id("signin-button")

        # Enter invalid user credentials into the input fields
        email_input.clear()
        email_input.send_keys("mateen.2kw19@gmail.com")
        password_input.clear()
        password_input.send_keys("wrongpassword")

        # Click the signin button
        signin_button.click()

        # Verify error message for invalid credentials
        error_message = self.driver.find_element_by_id("error-message")
        self.assertEqual(error_message.text, "Invalid email or password")

    def test_forgot_password(self):
        # Find the signin link and click it
        signin_link = self.driver.find_element_by_link_text("Signin")
        signin_link.click()

        # Find the "Forgot Password" link and click it
        forgot_password_link = self.driver.find_element_by_link_text("Forgot Password")
        forgot_password_link.click()

        # Find the input field and submit button
        email_input = self.driver.find_element_by_id("email")
        submit_button = self.driver.find_element_by_id("submit-button")

        # Enter the email for password reset
        email_input.clear()
        email_input.send_keys("mateen.2k19@gmail.com")

        # Click the submit button
        submit_button.click()

        # Verify success message for password reset
        success_message = self.driver.find_element_by_id("success-message")
        self.assertEqual(success_message.text, "Password reset email sent")

    def test_product_purchase(self):
        # Find the product link and click it
        product_link = self.driver.find_element_by_link_text("Products")
        product_link.click()

        # Find the product to purchase (e.g., keyboard) and click its "Buy Now" button
        product_button = self.driver.find_element_by_id("keyboard-buy-now")
        product_button.click()

        # Verify successful purchase message
        purchase_message = self.driver.find_element_by_id("purchase-message")
        self.assertEqual(purchase_message.text, "Keyboard purchased successfully")

    def test_product_out_of_stock(self):
        # Find the product link and click it
        product_link = self.driver.find_element_by_link_text("Products")
        product_link.click()

        # Find the product that is out of stock (e.g., headset) and click its "Buy Now" button
        product_button = self.driver.find_element_by_id("headset-buy-now")
        product_button.click()

        # Verify out of stock message
        out_of_stock_message = self.driver.find_element_by_id("out-of-stock-message")
        self.assertEqual(out_of_stock_message.text, "Headset is currently out of stock")

if __name__ == "__main__":
    unittest.main()
