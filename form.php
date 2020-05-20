<html> 

<title>Credit Card Approval</title>

<body bgcolor="lightblue">


<u><h1><center>CREDIT CARD APPROVAL</center></h1></u> <br> <br>

<form method="POST"> 

<u>ENTER THE DETAILS : </u><br><br>
CUSTOMER'S ID: <input type="text" name="customer_id">  <br><br>

ALGORITHM :<input type="radio" name="algo" value="randomforest">RANDOM FOREST  
<input type="radio" name="algo" value="logistic">LOGISTIC REGRESSION<br><br>

<input type="submit" value="SUBMIT" name="submit">

</form>

</body>

</html>

<?php 


if(isset($_POST['submit']))
{
	$customer_id = $_POST['customer_id'];
	$algo = $_POST['algo'];
	if($algo=="randomforest")
	{
		
		$tmp = exec("RandomForest.py $customer_id ");

		if(strcmp($tmp,"[0]")==0)
			echo "NO CREDITS SHOULD BE GIVEN FURTHER AS PAST RECORDS ARE NOT GOOD. \n";
		else
			echo "YES, EXCELLENT CUSTOMER \n";
	}
	
	if($algo=="logistic")
	{
		
		$tmp1 = exec("LogisticRegression.py $customer_id");
		 
		if(strcmp($tmp1,"[0]")==0)
			echo "NO CREDITS SHOULD BE GIVEN FURTHER AS PAST RECORDS ARE NOT GOOD. \n";
		else
			echo "YES, EXCELLENT CUSTOMER \n";
	}
		
 
}
	
?> 