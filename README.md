## Getting Started

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
14. Access the laravel websocket url **http://{your app}.test/laravel-websockets**. After that, click the connect button.

    ![image](https://github.com/LBonsai/realtime-notifications/assets/47714130/870d2bcb-8987-4e43-b40a-458a5b175bbd)

### Testing

1. Download and Install [Postman](https://www.postman.com/downloads/)
2. Open the application and import this collection of API request that I created for testing the API.
   [Realtime Notification API.postman_collection.json](https://github.com/LBonsai/realtime-notifications/files/13451486/Realtime.Notification.API.postman_collection.json)
3. Just change the API url based on your application URL and also change the values that are predefined.
4. For testing of realtime notification, just navigate to the **http://{your app}.test** and try to perform some testing of API that has a realtime notification like logout, login and creating of new notification.
   i.e ![image](https://github.com/LBonsai/realtime-notifications/assets/47714130/9386446b-5359-4908-ade3-9f3f7485c963)
5. You can also check the **http://{your app}.test/laravel-websockets** while doing some testing for the realtime notification to check for the events that are trigger.







