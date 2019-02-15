# register-project
 A register app that allow the user to register and sign in to the system. The project emphasizes using php to build the application.
 
This application can be accessed on page https://register-project.geneticwear.id


## App Functionality

### Index
In this page, the mainpage displays are

Sign in form

- Username/Email

- Password

Link to register page

When user sign in successfully the system will redirect to dashboard page.

### Register
In this page, the mainpage displays are

Register form

- Name

- Email

- Username

- Password

- Password Confirmation

Link to Sign in page

after user fill all the fields and click on register button, the user will redirect to mainpage to sign in.

### Dashboard

After succesfully sign in the user will redirect to dashboard page and show  to the user his/her data, how many times he already sign-in and last time the user sign in.

### Logout

After succesfully sign in, user can exit application and will redirect to index page.

## How To Use

1. Download Project, place it in your `htdocs` or `/var/www/html`. 
2. Create Database (It is recommended that the name `register_project`).
3. Open file config.php, change 
    $db_user = "[your username]"
    $db_pass = "[your password]"
    $db_name = "[your DB name]"
4. Open in your browser.

note:

1. You must have connection to internet because this application use cdn file. 
2. For best experience, please use chrome. If you get error or trouble, please use different browser. If you have questions, you can contact me by email to hannif.kurniawan@gmail.com

Thanks.

Best Regards,

Hannif Kurniawan M
