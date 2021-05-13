# Sending $_POST data to other domain Using cURL and PHP

The problem is to store the message form data in a remote database on a different domain that I cannot connect directly to.

The flow is as follows:
1. User will submit the form, as usual.
2. In the form processing PHP, I use cURL to execute a POST transmission to a PHP script on the other domain server.
3. The remote script would do a MySQL INSERT query into the other domain's database.

Form data is stored in into an array:
```
$data = array(
   "u_name" => "$u_name",
   "data" => "$data"
);
```
Now comes the function to post the data to a new domain given in the URL using cURL.
```
The function takes two parameters: the URL and the data array.
```
```
function post_to_url($url, $data) {

   $fields = '';
   foreach($data as $key => $value) { 
      $fields .= $key . '=' . $value . '&'; 
   }
   rtrim($fields, '&');

   $post = curl_init();

   curl_setopt($post, CURLOPT_URL, $url);
   curl_setopt($post, CURLOPT_POST, count($data));
   curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
   curl_setopt($post, CURLOPT_RETURNTRANSFER, true);

   $result = curl_exec($post);

   curl_close($post);
}
```

On the receiving end, we insert the form data into the database table of domain2.com and then we send the success or failure response based on the post data back to domain1.com.

