
<?php 
	$rating = (float)$_POST["rating"];
	if($rating>=0 && $rating<=10){
		$conn = mysqli_connect("localhost", "root", "#Harsh6169", "movies");
		if($conn){
			$userRatingQuery = "SELECT ratings FROM moviesInformation WHERE moviesName='Mission mangal'";
			$rating = $conn->query($userRatingQuery)->fetch_assoc()["ratings"];
			$noOfUsersQuery = "SELECT noOfUsers FROM moviesInformation WHERE moviesName='Mission mangal'";
			$noOfUsers = $conn->query($noOfUsersQuery)->fetch_assoc()["noOfUsers"];
			$total = $noOfUsers*$rating;
			$newTotalRating = $total+$rating;
			$noOfUsers = $noOfUsers+1;
			$rating = $newTotalRating/$noOfUsers;
			$updateRatingQuery = "UPDATE moviesInformation SET ratings=$rating WHERE moviesName='Mission mangal'";
			$updateNoOfUsersQuery = "UPDATE moviesInformation SET noOfUsers=$noOfUsers WHERE moviesName='Mission mangal'";
			$conn->query($updateRatingQuery);
			$conn->query($updateNoOfUsersQuery);
		}
	}
	else{
		echo "provide rating between 0 and 10 both inclusive";
	}
?>
