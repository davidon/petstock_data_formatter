### Install
* composer install
### Run from CLI  
The first output message is: *The script is running from CLI*, followed by JSON data.
* Sort result by total  
`php assessment.php 1`

* Sort result by order date  
`php assessment.php 2`
* Filter result of orders without items  
`php assessment.php 3`
* When option is out of range  
`php assessment.php 4`  
Output: Invalid Parameter.

See the output examples in `Docs` folder.  
### Run from browser
The first output message is: *The script is running from browser*, followed by JSON data.
* Start local server  
`php -S localhost:8000`  

* Visit in web browser:
http://localhost:8000/assessment.php?option=1
http://localhost:8000/assessment.php?option=2
http://localhost:8000/assessment.php?option=3

When option parameter is not valid, browser output *Invalid Parameter.*.
