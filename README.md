This is standalone sample rest api client written in php ( 7.x & 8.x ).
Feel free to use it as You want, it completely free and it will stays like that.

Because of atm. just simple working sample, some of things like rest file upload is not included.
If You have good reason to ask about additional features, write to me at robertkomasara@protonmail.com.

In Examples dir, You will find out few use cases, it should works with most of standard rest api endpoints.
Any modifications by You in my code are allowed outside this repository, You can always let me know if You added something interesting.
Probably from time to time, I will update this library by another good to have features eg. another methods of authorization or file uploads.

Usage : 

┌─[robert@robert-G5-KD]─[~/projects/rest-client/src/Examples/Advanced/SampleAdd]
└──╼ > php ./ApiEndpoint.php username password
array(2) {
  ["data"]=>
  string(143) "{"id":4871,"name":"ApiEndpointSampleAdd","site_url":"https:\/\/redops.pl","logo_filename":"cybersecurity.jpg","ordering":1669,"source_id":null}"
  ["code"]=>
  int(201)
}

Important : 

- In this example, You need to implement own simple class per api endpoint as I did in src/Examples/Advanced/SampleAdd/ApiEndpoint.php.
- If You are looking for more generic & simple, but less flexible version check src/Examples/SampleAdd.php & src/Examples/SampleList.php.

Whole of code is done by me and only me. Happy hacking, cheers :)

