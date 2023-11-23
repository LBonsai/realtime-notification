[Realtime Notification API.postman_collection.json](https://github.com/LBonsai/realtime-notifications/files/13451486/Realtime.Notification.API.postman_collection.json)### Getting Started

### Prerequisites
* [Laragon](https://laragon.org/download/) (Development Environment)
* [Postman](https://www.postman.com/downloads/) (For Testing of API)

### Installation

1. Download and Install [Laragon](https://laragon.org/download/). You can refer to this [guide](https://laragon.org/docs/install.html).
2. After you finish the installation. Clone the [repo](https://github.com/LBonsai/realtime-notifications.git) and place it inside the **www** directory of you Laragon. In my case, I place it in the **C:\laragon\www** directory.
3. After that, open the Laragon. Click the settings icon at the upper right. Go to **Services and Ports** tab and copy this setting.

   ![Services and Ports](https://github.com/LBonsai/realtime-notifications/assets/47714130/22eeb180-80b7-435c-8ae1-5b8d7bc81b73)
6. Go to **General** tab and copy this setting.
   
   ![General](https://github.com/LBonsai/realtime-notifications/assets/47714130/a856f499-08c6-4294-b152-548fe661e79e)
7. Save the changes and click the Start button.
8. Check the host file if the app is already added to the list. If not, uncheck and check the Auto-create Virtual Hosts in the **General** tab.
   ![host file](https://github.com/LBonsai/realtime-notifications/assets/47714130/024cbc91-48ff-464a-9947-f354e6b98cf3)
9. Copy the .env file and place it in the root directory of your application.
10. Run the ff commands
    ```bash
    $ composer install
    ```
    ```bash
    $ npm install
    ```
    ```bash
    $ php artisan key:generate
    ```
10. Create a database based on the database name on your .env.

    ![image](https://github.com/LBonsai/realtime-notifications/assets/47714130/9b80b977-f7fd-4f0a-981b-01725b339398)
11. After creating a database, run the command.
    ```bash
    $ php artisan migrate
    ```
12. Run the command
    ```bash
    $ npm run build
    ```
13. Run the command
    ```bash
    $ php artisan websocket:serve
    ```
14. Access the laravel websocket url **/laravel-websockets**. After that, click the connect button.

    ![image](https://github.com/LBonsai/realtime-notifications/assets/47714130/870d2bcb-8987-4e43-b40a-458a5b175bbd)

### Testing

1. Download and Install [Postman](https://www.postman.com/downloads/)
2. Open the application and import this collection of API request that I created for testing the API.
   [Uploading R{
	"info": {
		"_postman_id": "bbe61226-4834-4575-b49f-530bded499a7",
		"name": "Realtime Notification API",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "8530651"
	},
	"item": [
		{
			"name": "Auth",
			"item": [
				{
					"name": "Login",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "email",
									"value": "testemail@gmail.com",
									"type": "text"
								},
								{
									"key": "password",
									"value": "test123456",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://realtime-notification.test/api/login",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"login"
							]
						}
					},
					"response": []
				},
				{
					"name": "Logout",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "110|JnhsiRB2ctnXZcKAgYqOsfpCKvIOursoiuR26Dml7599d0e8",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "http://realtime-notification.test/api/logout",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"logout"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "User",
			"item": [
				{
					"name": "Add User",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "name",
									"value": "John Ford",
									"type": "text"
								},
								{
									"key": "email",
									"value": "testemail@gmail.com",
									"type": "text"
								},
								{
									"key": "password",
									"value": "test123456",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://realtime-notification.test/api/users",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"users"
							]
						}
					},
					"response": []
				},
				{
					"name": "User Profile",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "107|jQgKv2ricmlG1jaZA1coT2NcY6KegQyfcgQVXGvD5f5920e5",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "http://realtime-notification.test/api/users/90",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"users",
								"90"
							]
						}
					},
					"response": []
				},
				{
					"name": "Get Notification by UserId",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "107|jQgKv2ricmlG1jaZA1coT2NcY6KegQyfcgQVXGvD5f5920e5",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "http://realtime-notification.test/api/users/90/notifications",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"users",
								"90",
								"notifications"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update Notification Setting",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "107|jQgKv2ricmlG1jaZA1coT2NcY6KegQyfcgQVXGvD5f5920e5",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "is_enable_notification",
									"value": "0",
									"type": "text"
								},
								{
									"key": "_method",
									"value": "PUT",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://realtime-notification.test/api/users/notification-settings",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"users",
								"notification-settings"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Notification",
			"item": [
				{
					"name": "Add Notification",
					"protocolProfileBehavior": {
						"disabledSystemHeaders": {
							"accept": true
						}
					},
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "107|jQgKv2ricmlG1jaZA1coT2NcY6KegQyfcgQVXGvD5f5920e5",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "message",
									"value": "notification1",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://realtime-notification.test/api/notifications",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"notifications"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete Notification",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "107|jQgKv2ricmlG1jaZA1coT2NcY6KegQyfcgQVXGvD5f5920e5",
									"type": "string"
								}
							]
						},
						"method": "DELETE",
						"header": [],
						"url": {
							"raw": "http://realtime-notification.test/api/notifications/27",
							"protocol": "http",
							"host": [
								"realtime-notification",
								"test"
							],
							"path": [
								"api",
								"notifications",
								"27"
							]
						}
					},
					"response": []
				}
			]
		}
	]
}ealtime Notification API.postman_collection.json…]()





