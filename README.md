# Sending $_POST data to other domain Using cURL & PHP

The problem is to store the message form data in a remote database on a different domain that I cannot connect directly to.

The flow is as follows:
1. User will submit the form, as usual.
2. In the form processing PHP(index.php), I use cURL to execute a POST transmission to a PHP script on the other domain.
3. The remote script(global_receive.php) would do a MySQL INSERT query into the other domain's database table(receiver_tbl).

On the receiving end, we insert the form data into the database table of domain 2 and then we send the success or failure response back to domain 1.

