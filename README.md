# Plugin Disable WP Rest API And Create Simple Auth / Plugin ปิด WP Rest API ของตัวเริ่มต้นแล้วก็สร้าง Auth ไว้ใช้งาน

- Plugin ตัวนี้ใช้การ Check Auth แบบง่ายๆ 
- หากมีปัญหา ติดต่อได้ที่เว็บไซต์ https://i-makeweb.com
- เข้ามาพูดคุยเรื่อง Wordpress กันได้ที่ https://www.facebook.com/groups/1562931627063799/

# How To use / วิธีใช้งาน

- Download to plugin Floder / ดาวน์โหลดแล้วเอาไปวางไวที่ Floder Plugin 
- Acticate Plugin / กด Activate 
- 

# Example Code / ตัวอย่าง Code
### 1.ตัวอย่างการใช้งานตามฟังก์ชั่นของ Wordpress ผ่าน wp_remote_get
    ```sh
    $default_url = 'http://example.com/wp-json/wp/v2/posts';
	$username = 'admin';
	$password = 'admin';

	$data = wp_remote_get($default_url, [
		'headers' => [
			'Authorization' => 'Basic '.base64_encode($username.':'.$password)
		]
	]);

	echo "<pre>";
		print_r(json_decode($data['body']));
    ```
    
 ### 2. ตัวอย่างการใช้งานผ่าน CURL
   
     ```sh
	$url = 'http://example.com/wp-json/wp/v2/posts';

	//  Initiate curl
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_USERPWD, "admin:admin");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);
	curl_close($ch);

	echo "<pre>";
		var_dump(json_decode($result, true));
	
	```
### License
GPL


