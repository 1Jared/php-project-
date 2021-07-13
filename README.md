# php-project-
project URL is: http://eve.kean.edu/~patdharn/TECH3740
For the authentication ,I have used Cookies,not sessions.
1.  “Search” function. When the “Search” button is clicked, a program named search_employee.php
should be called to do the followings:
1.1 ______  If the field is not empty, the program should be called to search and compare the
address field against the EMPLOYEE table in TECH3740 database.
1.2 ______  If the user enter “*”, your program should list all the employee in the table as shown
in Figure 4.
1.3 ______  If the search keyword is not “*”, you should use pattern match to find and display the
record that the address contains the keyword. If no record found, display “No records in the database
for the keyword: xxx”. You need to replace the xxx with the keyword. No average and other
information should be shown on the browser
1.4 ______  If there records matched, display the correct records that the address contain the
keyword as shown in figure 5. You must use partial match in the SQL statement.
1.5 ______  There should be a statement “There are # employee are in the database that the
address contains the search keyword xxxx.” above the results. You need to replace the xxxx with
keyword as shown in Figure 5.


2.  “Login” function. An employee can type login ID and password on the input textboxes and a
program name named “login.php” should be called after the “Submit” button is clicked.
2.1 _____  If both login ID and password are not empty, the program should access the table
TECH3740.EMPLOYEE to verify the login and password.
2.2 _____  If the login not exists, show a message “Login xxxx is not in the system” and terminate
the program.
2.3 _____  If the login exists, and password not matched the record in the EMPLOYEE table, show a
message “Login xxxx in the system, but password not matched” and terminate the program.If the login ID and password match the record in the EMPLOYEE table, your program should do the
followings as shown in Figure 2.
2.4 ______  Always display client’s IP address and “You are from Kean domain.” under the IP
address, if user IP is from (10.*.*.*) or (131.125.*.*). Otherwise, display “You are NOT from Kean
University”. You can use the lynx command on the eve sever for checking if the IP is from the Kean’s
wired network.
2.5 _____  Display a welcome message with employee name, role, salary, address, gender. (1 pt/ea)
2.6 _____  Under employee information, add a link “Add products”, an input box and search button
to search product in your Products_XXXX table in the database.


3.  “Add” function: After “Add products” is clicked, a program “add_product.php” is called to do the
followings:
3.1 _____  If the employee doesn’t login successfully, your program should display “please login
first!” without displaying other information.
3.2 _____  If the employee login successfully, a Add Product web page as shown in Figure 3 will be
displayed and allow user to add a new product - enter name, description, 3 product types in radio
buttons, cost, sell price and quantity in textboxes, select vendor names in a dropdown list, and a
submit button.
3.3 _____  Your PHP program should retrieve all the vendor id and names first from table
TECH3740.VENDOR (5 pts), and only display the vendor names in the dropdown list (5 pts) for the user
to select.

4.  “Insert” function: After user clicks the Submit button, a program “insert_product.php” should be
called to verify the data and do the followings: Note: The program name must be insert_product.php.
4.1 _____  If the employee doesn’t login successfully and try to run the program directly, your
program should display “Please login first!” without displaying other information.
4.2 _____  If the employee login successfully and the input has errors, NO data should be inserted
into your Products_XXXX table.
4.3 _____  If 1. quantity, cost or sell_price <= 0; 2. sell_price < cost; 3. Any input box is empty;
display the corresponding error message after clicking the submit button.
4.4 _____  If same product name exists in your Products_XXXX table, display an error message
“Cannot have the same product name”.
4.5 _____  If there is no error, insert the data into your Products_XXXX table  and show
successful message “xxx product has been added successfully” .

5.  “Search/Display” function: After clicking on “Search” button, a program named
“display_search_products.php” should be called to do the following functions. Refer to Fig 4 and Fig 5.
5.1 _____  If the employee doesn’t login successfully and try to run the program directly, your
program should display “Please login first!” without displaying other information.
5.2 _____  If the search keyword is “*”, display all the products in your Products_XXXX table.
(Figure 4)
5.3 _____  if the search keyword is not “*”, show the records that products’ names and
descriptions in your Products_XXXX table pattern matched the search keyword as shown in Figure 5.
5.4 _____  Show vendor name, not vendor id.
5.5 _____  Show employee name, not employee id.
5.6 _____  Show other column information correctly as shown in Figure 4 and 5.
5.7 _____  Display the total profit if all the quantities of the displaying products are sold under the
table. The profit of each product can be calculated: profit = (sell price – cost) * quantity
5.8 _____  If a product quantity is < 5, highlight that quantity in red as shown in Figure 4.
