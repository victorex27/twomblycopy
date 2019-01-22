<?php
	//include_once('server.php');
	class User{

		private $id;
		private $class_type;
		private $table;
		private $conn;

		public function __construct($id){

			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$dbname = 'twomblybeta';

		
			$this->conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password,array(
//PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
//PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",

) );


		//$this->conn->setAttribute(PDO::MYSQL_ATTR_MAX_BUFFER_SIZE, 1024 * 1024 * 10);
			

			if(!$this->conn){
    			throw new Exception('Connection Error '.mysqli_connect_error()) ;
			}

			

			$this->id = $id;
			
			
			
			$sql = "SELECT user_type FROM users WHERE id =:user";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$this->id);
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$this ->class_type = $row['user_type'];
			}

								
				
				
		}
		
		public function getUserType(){
			
			return $this ->class_type;
		}
		
		public function getOtherUserType($id){
			
			$sql = "SELECT user_type FROM users WHERE id =:user";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$id);
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					return $row['user_type'];
			}
		}
	
		public function getUsername($username){
			
			$sql = "SELECT id,username FROM users WHERE username LIKE :username AND user_type != 'C' ORDER BY username ASC";
			
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":username",$username);
			
			$stmt->execute();
			//return $stmt;
			$result = array();
			
			if($stmt->rowCount() > 0){
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$data['id'] = $row['id'];
					$data['username'] = $row['username'];
				
					array_push($result, $data);
				}
			}
			
			return $result;
			
			
		}


		public function getPosts($category){
			
			$filter = '';
			if($category !== 'All'){
				$filter = ' WHERE category =:category ';
			}

			$sql = "SELECT posts.id as post_id,posts.user_id,username,category.name as category,firstname,lastname,phonenumber,address,location,email,profileimage,imageType,message,title,posts.time,posts.image as postimage,rating,
			(SELECT favorites.user_id FROM favorites WHERE user_id=:id AND favorites.post_id = posts.id) as fav,(SELECT track.user_id FROM track WHERE host_id=:id AND track.user_id = posts.user_id) as track  
			FROM posts 
			INNER JOIN users 
			ON posts.user_id = users.id INNER JOIN category ON category.id = posts.category   $filter ORDER BY time desc";
			
			$stmt = $this->conn->prepare($sql);
			
			if($category !== 'All'){
				$stmt->bindParam(":category",$category);
			}
			
			$stmt->bindParam(":id",$this->id);
			
			$stmt->execute();
			return $stmt;
		}


		public function getPost($id){
			
			$limit = (int)($id - 1);

			$sql = "SELECT posts.id as post_id,user_id,username,firstname,lastname,category.name as category,phonenumber,address,location,email,profileimage,imageType,message,title,posts.time,posts.image as postimage,rating,
			(SELECT favorites.user_id FROM favorites WHERE user_id=:id AND favorites.post_id = posts.id) as fav,(SELECT track.user_id FROM track WHERE host_id=:id AND track.user_id = posts.user_id) as track FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN category ON category.id = posts.category  WHERE posts.user_id=:id ORDER BY time desc LIMIT :limit,1";
			
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(":id",$this->id);
			
			$stmt->bindParam(":limit",$limit, PDO::PARAM_INT);

			
			
			$stmt->execute();
			return $stmt;
		}
		
		
		public function getPostById($id){
			
			$limit = (int)($id - 1);

			$sql = "SELECT posts.id as post_id,user_id,username,firstname,lastname,category.name as category,phonenumber,address,location,email,profileimage,imageType,
			message,title,posts.time,posts.image as postimage,rating,(SELECT favorites.user_id FROM favorites WHERE user_id=:id AND favorites.post_id = posts.id) as fav,(SELECT track.user_id FROM track WHERE host_id=:id AND track.user_id = posts.user_id) as track FROM 
			posts INNER JOIN users 
			ON posts.user_id = users.id 
			INNER JOIN category ON category.id = posts.category  
			WHERE posts.id=:post_id ORDER BY time desc LIMIT 1";
			
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(":post_id",$id);
			$stmt->bindParam(":id",$this->id);
			

			
			
			$stmt->execute();
			return $stmt;
		}



		public function getPostIdOfUser(){

			$sql = "SELECT id  FROM posts  WHERE user_id=:id ORDER BY time desc";
			
			$stmt = $this->conn->prepare($sql);

			$stmt->bindParam(":id",$this->id);
			
			
			$stmt->execute();

			$array = array();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

				
				array_push($array, $row['id']);

			}


			return $array;
		}


		public function getPostsByCurrentUser($id){

			$sql = "SELECT posts.id as post_id,user_id,username,firstname,lastname,phonenumber,address,location,email,profileimage,imageType,message,title,category.name as category,posts.time,posts.image as postimage,rating,
(SELECT favorites.user_id FROM favorites WHERE user_id=:id AND favorites.post_id = posts.id) as fav,(SELECT track.user_id FROM track WHERE host_id=:id AND track.user_id = posts.user_id) as track
			FROM posts INNER JOIN users ON posts.user_id = users.id INNER JOIN category ON posts.category = category.id WHERE posts.user_id =:user_id ORDER BY time desc";
			
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user_id",$id);
			$stmt->bindParam(":id",$this->id);
			
			$stmt->execute();
			return $stmt;
		}



		public function getPostsFeedback($id){
			// this is for the general post. $id here is that of the post
			$sql = "SELECT * FROM posts feedback WHERE post_id =:id ORDER BY time asc";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			return $stmt;
		}


		public function getPersonalPostMessages(){
			// this is for the general post. $id here is that of the post
			$sql = "SELECT firstname,lastname,posts_feedback.date as time,rating,location,posts_feedback.title,
					posts_feedback.message,posts_feedback.user_id,data,mime,documents.id as documents_id  
					FROM posts_feedback 
					INNER JOIN posts 
					ON posts_feedback.post_id = posts.id 
					INNER JOIN users 
					ON users.id = posts_feedback.user_id 
                    LEFT JOIN documents
                    ON posts_feedback.id = documents.posts_feedback_id
					WHERE posts.user_id =:id AND  posts_feedback.user_id <> :id 
                    UNION 
					SELECT firstname,lastname,message_time as time,rating,location,title,
					message_content as message,sender_id as user_id,null as data,null as mime, null as documents_id 
					FROM messages 
					INNER JOIN users 
					ON users.id = messages.recipient_id 
					WHERE messages.recipient_id =:id AND messages.sender_id <> :id 
					ORDER BY time DESC";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt;
		}
		public function getSentMessages(){
			// this is for the general post. $id here is that of the post
			$sql = "SELECT firstname,lastname,posts_feedback.date as time,rating,location,posts_feedback.title,
					posts_feedback.message,posts.user_id as user_id,data,mime,documents.id as documents_id  
					FROM posts_feedback 
					INNER JOIN posts 
					ON posts_feedback.post_id = posts.id 
					INNER JOIN users 
					ON users.id = posts_feedback.user_id 
                    LEFT JOIN documents
                    ON posts_feedback.id = documents.posts_feedback_id
					WHERE  posts_feedback.user_id = :id 
                    UNION 
					SELECT firstname,lastname,message_time as time,rating,location,title,
					message_content as message,recipient_id as user_id,null as data,null as mime, null as documents_id 
					FROM messages 
					INNER JOIN users 
					ON users.id = messages.sender_id 
					WHERE messages.sender_id =:id AND messages.recipient_id <> :id 
					ORDER BY time DESC";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt;
		}


		public function getNumUnreadMessages(){
			// this is for the general post. $id here is that of the post
			$sql = "SELECT firstname,lastname,posts_feedback.date as time,rating,location,posts_feedback.title,
					posts_feedback.message,posts_feedback.user_id,data,mime  
					FROM posts_feedback 
					INNER JOIN posts 
					ON posts_feedback.post_id = posts.id 
					INNER JOIN users 
					ON users.id = posts_feedback.user_id 
                    LEFT JOIN documents
                    ON posts_feedback.id = documents.posts_feedback_id 
					WHERE posts.user_id =:id AND status = '0' AND  posts_feedback.user_id <> :id
                    UNION 
					SELECT firstname,lastname,message_time as time,rating,location,title,
					message_content as message,sender_id as user_id,null as data,null as mime 
					FROM messages 
					INNER JOIN users 
					ON users.id = messages.recipient_id 
					WHERE messages.recipient_id =:id AND status = '0' AND messages.sender_id <> :id 
					ORDER BY time DESC";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->rowCount();
		}


		public function upDateReadMessagesStatus(){

			$sql1 = "Update messages SET status= '1' WHERE recipient_id=:id ";
			$stmt1 = $this->conn->prepare($sql1);
			$stmt1->bindParam(":id",$this->id);
			$stmt1->execute();


			
			$sql2 = "Update posts_feedback INNER JOIN posts ON posts.id = posts_feedback.post_id SET status= '1' WHERE posts.user_id=:id ";
			$stmt2 = $this->conn->prepare($sql2);
			$stmt2->bindParam(":id",$this->id);
			$stmt2->execute();
			


		}

		public function replyToPost($posts_id,$title,$message){
			//post feedback

			//$sql = "insert into posts_feedback (post_id,reply,user_id,user_type) Values ('1','reply','1','a')";
			
			$sql = "insert into posts_feedback (post_id,title,message,user_id) Values (:post_id,:title,:message,:id)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":post_id",$posts_id);
			$stmt->bindParam(":title",$title);
			$stmt->bindParam(":message",$message);
			$stmt->bindParam(":id",$this->id);
			
			$stmt->execute();
			return $this->conn->lastInsertId();

		}


		public function replyToMessage($user_id,$title,$message){
			//post feedback

			//$sql = "insert into posts_feedback (post_id,reply,user_id,user_type) Values ('1','reply','1','a')";
			
			$sql = "insert into messages (sender_id,recipient_id,title,message_content) Values (:id,:user_id,:title,:message)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user_id",$user_id);
			$stmt->bindParam(":title",$title);
			$stmt->bindParam(":message",$message);
			$stmt->bindParam(":id",$this->id);
			
			return $stmt->execute();

		}

		

		public function getTrack(){


			$sql = "SELECT * FROM track WHERE host_id =:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt;
		}


		public function addToFavorites($post_id){
			//

			$sql = "insert into favorites (user_id,post_id) Values (:user,:post)";
			
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$this->id);
			$stmt->bindParam(":post",$post_id);
			
			if($stmt->execute() == "1"){
				return "1";
			}else{
				
				$sql = "DELETE from favorites WHERE user_id=:user AND post_id=:post";
			
				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(":user",$this->id);
				$stmt->bindParam(":post",$post_id);
				$stmt->execute();
				
			}
			
			return "0";

		}


		public function viewFavorites(){

			$sql = "SELECT posts.id as post_id,users.id as user_id ,concat(users.firstname,' ', users.lastname) as name,category,title,posts.time,message 
			FROM favorites 
			INNER JOIN posts 
			ON posts.id = favorites.post_id 
			INNER JOIN users 
			ON users.id = posts.user_id  
			WHERE favorites.user_id =:user";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$this->id);
			$stmt->execute();
			return $stmt;

		}

		public function addToBookMarks($id ){
			
			
			$sql = "insert into bookmark (host_id,user_id) Values (:host,:user)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":host",$this->id);
			$stmt->bindParam(":user",$id);

			
			if($stmt->execute() == "1"){
				return "1";
			}else{
				
				$sql = "DELETE from bookmark WHERE user_id=:user AND host_id=:host";
			
				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(":host",$this->id);
				$stmt->bindParam(":user",$id);
				$stmt->execute();
				
			}
			
			return "0";
			
			
			

		}


		public function viewBookMarks(){

			$sql = "SELECT * FROM bookmark WHERE host_id =:user";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$this->id);
			$stmt->execute();
			return $stmt;
		}

		public function makePost($category,$title,$message){

			$sql = "insert into posts (user_id,category,title,message) Values (:user,:category,:title,:message)";
			$stmt = $this->conn->prepare($sql);
			
			$stmt->bindParam(":category",$category);
			$stmt->bindParam(":title",$title);
			$stmt->bindParam(":message",$message);
			$stmt->bindParam(":user",$this->id);
			
			//$count = mysqli_num_rows($result);
			//$row = mysqli_fetch_assoc($result);

			return $stmt->execute();
		}

		








		public function receiveMessagesFromFeed(){}

		public function uploadProfilePicture($file){

				$sql = "UPDATE users SET image=:file WHERE id =:id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":file",$file);
			$stmt->bindParam(":id",$this->id);
			
			return $stmt->execute();
		}

		public function editSettings(){}

		

		public function changeUserName($username){

				$sql = "UPDATE users SET username =:user WHERE id =:id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$username);
			$stmt->bindParam(":id",$this->id);
			
			return $stmt->execute();

		}

		public function changePassword($password){



				$sql = "UPDATE users SET users.password = md5(:password) WHERE id =:id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":password",$password);
			$stmt->bindParam(":id",$this->id);
			//$count = mysqli_num_rows($result);
			//$row = mysqli_fetch_assoc($result);

			return $stmt->execute();

		}


		public function changeEmail($email){

			$sql = "UPDATE users SET email =:email WHERE id =:id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":email",$email);
			$stmt->bindParam(":id",$this->id);
			//$count = mysqli_num_rows($result);
			//$row = mysqli_fetch_assoc($result);

			if($stmt->execute())
				return 1;
			
			return 0;

		}
		
		public function changeFirstname($firstname){

				$sql = "UPDATE users SET firstname =:firstname WHERE id =:id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":firstname",$firstname);
			$stmt->bindParam(":id",$this->id);
			
			return $stmt->execute();

		}
		
		public function changeLastname($lastname){

				$sql = "UPDATE users SET lastname =:user WHERE id =:id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$lastname);
			$stmt->bindParam(":id",$this->id);
			
			return $stmt->execute();

		}
		
		public function changeMobile($mobile){

				$sql = "UPDATE users SET phonenumber =:user WHERE id =:id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$mobile);
			$stmt->bindParam(":id",$this->id);
			
			return $stmt->execute();

		}

		public function getCategory(){

        $sql = "SELECT id, name 
                   FROM category
                  ORDER BY name ASC;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
		$ans = array();
		$a = 9;
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$temp = array();
			$temp['id'] = $row['id'];
			$temp['name'] = $row['name'];
			
			array_push($ans,$temp);
			
			
		}
        
     

        return $ans;
    }
	
	
	public function getCategoryByName($name){

        $sql = "SELECT id
                   FROM category WHERE name=:name
                  ORDER BY name LIMIT 1;";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":name",$name);
        $stmt->execute();
		
		
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			return $row['id'];
			
			
			
		}
        
     

        return "Missing";
    }

		

		


		// for other people's profile
		public function viewProfilePage($id){

				$sql = "SELECT concat(firstname,' ',lastname) as name,username,address,location,phonenumber,email,profileimage as image,imageType,rating,
				(SELECT track.user_id FROM track WHERE host_id=:host_id AND track.user_id =:user_id) as track,(SELECT bookmark.user_id FROM bookmark WHERE host_id=:host_id AND bookmark.user_id =:user_id) as bookmark FROM users WHERE id =:user_id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user_id",$id);
			$stmt->bindParam(":host_id",$this->id);
			$stmt->execute();

			//return $stmt;

			

        


		$stmt->bindColumn(1, $name);
			$stmt->bindColumn(2, $username);
			$stmt->bindColumn(3, $address);
			$stmt->bindColumn(4, $location);
			$stmt->bindColumn(5, $phonenumber);
			$stmt->bindColumn(6, $email);	
        $stmt->bindColumn(7, $image, PDO::PARAM_LOB);
        $stmt->bindColumn(8, $imageType);
			$stmt->bindColumn(9, $rating);
			$stmt->bindColumn(10, $track);
			$stmt->bindColumn(11, $bookmark);
		

        $stmt->fetch(PDO::FETCH_BOUND);


        return array("name" => $name,
            "username" => $username,
            "address" => $address ,
            "location" => $location ,
            "phonenumber" => $phonenumber ,
            "email" => $email ,
            "image" => $image ,
            "imageType" => $imageType ,
            "rating" => $rating,
            "track" => $track,
            "bookmark" => $bookmark
			);
			
		

		}

		public function getPdf($id){

				$sql = "SELECT data FROM documents WHERE mime='application/pdf' AND id =:id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$id);
			$stmt->execute();



		$stmt->bindColumn(1, $data);
		

        $stmt->fetch(PDO::FETCH_BOUND);


        return $data;
			
		

		}

		
		public function getPreviousPost(){
			
			

			$sql = "SELECT posts.id as post_id,user_id,username,category.name as category,firstname,lastname,phonenumber,address,location,email,profileimage,imageType,message,title,posts.time,posts.image as postimage,rating 
			FROM posts 
			INNER JOIN users 
			ON posts.user_id = users.id INNER JOIN category ON category.id = posts.category WHERE userid =:id  ORDER BY time desc";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt;

		}

		public function reEditPreviousPost($id,$category,$title,$message){

			$sql = "UPDATE  posts SET message =:message,title=:title,category=(SELECT id from category WHERe category.name=:category) WHERE id =:id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":message",$message);
			$stmt->bindParam(":title",$title);
			$stmt->bindParam(":category",$category);
			$stmt->bindParam(":id",$id);
			
			return $stmt->execute();

		}

		public function deletePost($id){

			$sql = "DELETE FROM  posts WHERE id =:id ";
			$stmt = $this->conn->prepare($sql);
			
			$stmt->bindParam(":id",$id);
			
			return $stmt->execute();

		}

		

		public function getFavouritesPage(){}

		public function recommend($from, $to){
			// recommending $from to $to
			$sql = "insert into recommendations (user_id,from_user,to_user) Values (:user,:from,:to)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$this->id);
			$stmt->bindParam(":from",$from);
			$stmt->bindParam(":to",$to);
			
			if($stmt->execute() == "1"){
				return "1";
			}else{
				
				$sql = "DELETE from recommendations WHERE user_id=:user AND from_user=:from AND to_user=:to ";
			
				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(":user",$this->id);
				$stmt->bindParam(":from",$from);
				$stmt->bindParam(":to",$to);
				$stmt->execute();
				
			}
			
			return "0";
			
			
			
			

		}

		public function getRecommendations(){

			$sql = "SELECT from_user,user_id, time_created FROM recommendations WHERE  to_user=:id ORDER BY time_created ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();

			
			return $stmt;

		}
		
		public function getUnreadRecommendationsCount(){

			$sql = "SELECT from_user,user_id, time_created FROM recommendations WHERE  to_user=:id AND status='0' ORDER BY time_created ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			
			

			
			return $stmt->rowCount();

		}
		
		public function updateRecommended($user){
			
			$sql = "UPDATE recommendations SET status = '1' WHERE from_user =:user AND to_user=:id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->bindParam(":user",$user);
			$stmt->execute();
			
			
		}

		// For type c 
		public function respondToReceivedMessagesFromClassAandClassB(){

		}
		
		
		public function getRate($id){
			
			$sql = "SELECT AVG(rate) as res FROM ratings WHERE user_id=:user";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user",$id);
			
			$stmt->execute();
			
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				
				return $row['res'];
			}
			
			return 0;
			
			
		}


		public function rate($user_id,$rate){


			$sql = "insert into ratings (host_id,user_id,rate) Values (:host,:user,:rate)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":host",$this->id);
			$stmt->bindParam(":user",$user_id);
			$stmt->bindParam(":rate",$rate);
			//$count = mysqli_num_rows($result);
			//$row = mysqli_fetch_assoc($result);


			if($stmt->execute() !== 1){

				$sql2 = "UPDATE ratings SET rate=:rate WHERE host_id=:host AND user_id=:user";
				$stmt2 = $this->conn->prepare($sql2);
				$stmt2->bindParam(":host",$this->id);
				$stmt2->bindParam(":user",$user_id);
				$stmt2->bindParam(":rate",$rate);


				return $stmt2->execute();
			}

			return 1;

			

			


		}


		public function track($user_id){


			$sql = "insert into track (host_id,user_id) Values (:host,:user)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":host",$this->id);
			$stmt->bindParam(":user",$user_id);
			
			

			
			if($stmt->execute() == "1"){
				return "1";
			}else{
				
				$sql = "DELETE from track WHERE user_id=:user AND host_id=:host";
			
				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(":host",$this->id);
				$stmt->bindParam(":user",$user_id);
				$stmt->execute();
				
			}
			
			return "0";
			
			
		}

		public function getTrackClients(){

			$sql= "SELECT title,message,track.user_id,posts.id as post_id,posts.time as time,category  
			FROM Posts 
			INNER JOIN track 
			ON posts.user_id = track.user_id 
			INNER JOIN users 
			ON users.id =  track.user_id 
			WHERE track.host_id =:id 
			AND posts.time > last_check";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			
			return $stmt;

		}

		public function updateTrack($user_id){

				$sql = "UPDATE track SET last_check = CURRENT_TIMESTAMP WHERE user_id =:user_id and host_id =:host_id ";
				$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":user_id",$user_id);
			$stmt->bindParam(":host_id",$this->id);
			
			return $stmt->execute();

		}

		public function getTrackNotification(){

			$sql = "SELECT track.user_id,posts.id as post_id FROM Posts 
			INNER JOIN track 
			ON posts.user_id = track.user_id 
			INNER JOIN users 
			ON users.id =  track.user_id WHERE 
			track.host_id =:id AND posts.time > last_check ORDER BY posts.time DESC";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();

			
			return $stmt;
    

		
		}
		
		public function getAllTrackNotification(){

			$sql = "SELECT track.user_id,posts.id as post_id FROM Posts 
			INNER JOIN track 
			ON posts.user_id = track.user_id 
			INNER JOIN users 
			ON users.id =  track.user_id WHERE 
			track.host_id =:id ORDER BY posts.time DESC";
			
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();

			
			return $stmt;
    

			//return $num;
		}


		public function uploadDocuments($filePath,$mime,$post_id,$title,$message){

			//use transaction and return state


			$posts_feedback_id = $this->replyToPost($post_id,$title,$message);

			$blob = fopen($filePath, 'rb');

        $sql = "INSERT INTO documents SET posts_feedback_id=:posts_feedback_id, mime = :mime,data =:data,user_id =:id;";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':posts_feedback_id', $posts_feedback_id);
        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute() ;


        
		}



		public function selectDocument($id) {

        $sql = "SELECT mime,
                        data
                   FROM documents 
                   INNER JOIN posts_feedback 
                   ON documents.posts_feedback_id = posts_feedback_.id
                  WHERE id = :id;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(":id" => $id));
        
        
        $stmt->bindColumn(1, $mime);
        $stmt->bindColumn(2, $data, PDO::PARAM_LOB);

        $stmt->fetch(PDO::FETCH_BOUND);

        return array("mime" => $mime,"data" => $data);

        
    }


		
		public function rateUser($id){


		}

		


		public function changeProfilePicture($filePath,$mime){

			// use uploadProdfilepicture

			$blob = fopen($filePath, 'rb');

        $sql = "UPDATE users
                SET imagetype = :mime,
                    profileimage = :data
                WHERE id = :id;";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();

		}


		public function uploadFile($filePath,$mime){

			// use uploadProdfilepicture

			$blob = fopen($filePath, 'rb');

        $sql = "INSERT INTO files 
                SET mime = :mime,
                    data = :data,
                    user_id = :id;";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();
		
		return $this->conn->lastInsertId();

		}


		public function selectGalleryId($id) {

        $sql = "SELECT id 
                   FROM files
                  WHERE user_id = :id ORDER BY id DESC;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(":id" => $id));
        
     

        return $stmt;
    }


    public function selectGallery($id) {

        $sql = "SELECT mime,
                        data
                   FROM files
                  WHERE id = :id;";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(":id" => $id));
        
        
        $stmt->bindColumn(1, $mime);
        $stmt->bindColumn(2, $data, PDO::PARAM_LOB);

        $stmt->fetch(PDO::FETCH_BOUND);

        return array("mime" => $mime,"data" => $data);

        
    }
	
	public function deleteFromGallery($id) {

        $sql = "DELETE
                   FROM files
                  WHERE id=:id  AND user_id=:user_id;";

        $stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":user_id", $this->id);
        return $stmt->execute();
        
       
    }


    // own profile
		public function getProfile(){


			$sql = "SELECT concat(firstname,' ',lastname) as name,firstname,lastname,username,address,location,phonenumber,email,profileimage as image,imageType,rating FROM users WHERE id =:id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();

			//return $stmt;

			

        


		$stmt->bindColumn(1, $name);
		$stmt->bindColumn(2, $firstname);
			$stmt->bindColumn(3, $lastname);
			$stmt->bindColumn(4, $username);
			$stmt->bindColumn(5, $address);
			$stmt->bindColumn(5, $location);
			$stmt->bindColumn(7, $phonenumber);
			$stmt->bindColumn(8, $email);	
        $stmt->bindColumn(9, $image, PDO::PARAM_LOB);
        $stmt->bindColumn(10, $imageType);
			$stmt->bindColumn(11, $rating);
			
		

        $stmt->fetch(PDO::FETCH_BOUND);


        return array(
			"name" => $name,
			"firstname" => $firstname,
			"lastname" => $lastname,
            "username" => $username,
            "address" => $address ,
            "location" => $location ,
            "phonenumber" => $phonenumber ,
            "email" => $email ,
            "image" => $image ,
            "imageType" => $imageType ,
            "rating" => $rating);
			
		
		}






	}


?>